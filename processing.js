// === Обработчик RabbitMQ Trace JSON (для тёмного фона Zabbix) ===
var data;

if (typeof value !== 'string' || !value.trim()) {
    return '<div style="color:#f44336;padding:8px;font-family:monospace;font-size:13px;font-weight:bold;">Ошибка: пустой или некорректный ввод</div>';
}

try {
    data = JSON.parse(value);
} catch (e) {
    return '<div style="color:#f44336;padding:8px;font-family:monospace;font-size:13px;font-weight:bold;">Ошибка парсинга JSON: ' + e.message + '</div>';
}

if (!Array.isArray(data)) {
    return '<div style="color:#ff9800;padding:8px;font-family:monospace;font-size:13px;font-weight:bold;">Ошибка: ожидался массив</div>';
}

if (data.length === 0) {
    var html = '<div style="font-family:monospace;font-size:13px;font-weight:bold;color:#e0e0e0;background-color:#2b2b2b;line-height:1.3;max-height:400px;overflow:auto;border:1px solid #555;border-radius:3px;padding:6px;">';
    html += '<div style="color:#4fc3f7;font-weight:bold;margin-bottom:6px;">RabbitMQ Trace</div>';
    html += '<div style="color:#bdbdbd;margin-bottom:8px;font-size:12px;">Всего: 0 | Доставлено: 0 | В промежуточной очереди: 0 (published_only)</div>';
    html += '<div style="color:#9e9e9e;">Нет данных</div>';
    html += '<div style="color:#757575;font-size:11px;text-align:right;margin-top:6px;">' + new Date().toLocaleString() + '</div>';
    html += '</div>';
    return html;
}

// === Сортировка: сначала published_only (в промежут-ой), потом delivered, внутри каждой группы - по id в обратном порядке ===
// 1. Разделяем по статусу
var inProgress = data.filter(function(item) { return item.routing_status === 'published_only'; });
var delivered = data.filter(function(item) { return item.routing_status === 'delivered'; });

// 2. Сортируем каждую группу по id в обратном порядке
inProgress.sort(function(a, b) { return b.id - a.id; });
delivered.sort(function(a, b) { return b.id - a.id; });

// 3. Объединяем: сначала проблемные (inProgress), потом доставленные (delivered)
data = inProgress.concat(delivered);

var total = data.length;
var deliveredCount = delivered.length;
var inProgressCount = inProgress.length;

var MAX_DISPLAY = 50;
var display = total > MAX_DISPLAY ? data.slice(0, MAX_DISPLAY) : data;

var html = '<div style="font-family:monospace;font-size:13px;font-weight:bold;color:#e0e0e0;background-color:#2b2b2b;line-height:1.3;max-height:400px;overflow:auto;border:1px solid #555;border-radius:3px;padding:6px;">';
html += '<div style="color:#4fc3f7;font-weight:bold;margin-bottom:6px;">RabbitMQ Trace</div>';
html += '<div style="color:#bdbdbd;margin-bottom:8px;font-size:12px;">Всего: ' + total + ' | Доставлено: ' + deliveredCount + ' | В промежут-ой: ' + inProgressCount + '</div>';

html += '<div style="background-color:#3b3b3b;padding:3px 0;margin-bottom:4px;font-weight:bold;border-radius:2px;">';
html += '<span style="display:inline-block;width:70px;">ID</span>';
html += '<span style="display:inline-block;width:110px;">Статус</span>';
html += '<span style="display:inline-block;width:120px;padding-left:8px;">Промежуточная</span>';
html += '<span style="display:inline-block;width:160px;">Время</span>';
html += '<span style="display:inline-block;width:180px;">Цель</span>';
html += '</div>';

display.forEach(function(msg) {
    var events = msg.events;
    var last = null;
    if (events && Array.isArray(events) && events.length > 0) {
        last = events[events.length - 1];
    }

    // === Определяем "Цель" для published_only ===
    var target = '—';
    if (last) {
        target = last.queue || last.routing_key || '—';
    }

    if (msg.routing_status === 'published_only' && !target.startsWith('n.t.')) {
        for (var j = 0; j < events.length; j++) {
            var ev = events[j];
            var evTarget = ev.queue || ev.routing_key || '—';
            if (evTarget.startsWith('neural.tasks.')) {
                target = evTarget.replace('neural.tasks.', 'n.t.');
                break;
            }
        }
    }

    var time = last ? last.timestamp : '—';
    var displayTime = time;
    var displayType = last ? (last.type || '—') : '—';
    if (time) {
        var match = time.match(/^(\d{4})-(\d{2})-(\d{2})\s+(\d{1,2}):(\d{2}):(\d{2}):(\d{3})$/);
        if (match) {
            var year = match[1].substr(2, 2);
            var month = match[2];
            var day = match[3];
            var hour = match[4];
            var minute = match[5];
            displayTime = day + '-' + month + '-' + year + ' ' + hour + ':' + minute;
        }
    }

    var displayStatus = msg.routing_status === 'delivered' ? 'доставлено' : 'в промежут-ой';
    var color = msg.routing_status === 'delivered' ? '#81c784' : '#e57373';

    var taskType = msg.first_task || 'unknown';
    if (taskType.startsWith('neural.tasks.')) {
        taskType = taskType.replace('neural.tasks.', 'n.t.');
    }

    html += '<div style="padding:2px 0;border-bottom:1px solid #444;background-color:#333333;">';
    html += '<span style="display:inline-block;width:70px;font-weight:bold;color:#64b5f6;">' + msg.id + '</span>';
    html += '<span style="display:inline-block;width:110px;color:' + color + ';">' + displayStatus + '</span>';
    html += '<span style="display:inline-block;width:120px;font-size:12px;color:#a1887f;overflow:hidden;text-overflow:ellipsis;padding-left:8px;" title="' + (msg.first_task || 'unknown') + '">' + taskType + '</span>';
    html += '<span style="display:inline-block;width:160px;font-size:12px;color:#90a4ae;">' + displayType + ': ' + displayTime + '</span>';
    html += '<span style="display:inline-block;width:180px;font-size:12px;color:#a5d6a7;overflow:hidden;text-overflow:ellipsis;">' + target + '</span>';
    html += '</div>';
});

html += '<div style="color:#757575;font-size:11px;text-align:right;margin-top:6px;">' + new Date().toLocaleString() + '</div>';
html += '</div>';

return html;
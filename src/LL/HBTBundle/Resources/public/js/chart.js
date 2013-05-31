google.load('visualization', '1.0', {'packages':['corechart']});

function initializeChart() {
    drawChart();
}

function drawChart() {
    $('#main-inner-body-chart-loading').show();
    $.ajax({
        url: '/web/app.php/chart/'+dateStart+'/'+dateEnd,
        type: 'GET',
        dataType: 'json',
        obj: this,
    }).done(function(data, status, xhr) {
        $('#main-inner-body-chart-loading').hide();
        var chart = new google.visualization.PieChart(document.getElementById('main-inner-body-chart'));
        // Create the data table.
        var data = new google.visualization.arrayToDataTable(data);
        buildChartControls(data, chart);
        // Set chart options
        var options = {
            //'title':'Daily Totals Per Category',
            'title':'Totals Per Category',
            'width':600,
            'height':300,
            //'pointSize': 3,
            //'interpolateNulls': true,
            'isHtml': true,
        };
        chart.draw(data, options);
    }).error(function(xhr, status) {
        $('#main-inner-body-chart-block').hide();
    });
}

function buildChartControls(data, chart) {
    var colNum = data.getNumberOfColumns();
    var cols = Array();
    for (x=0; x<colNum; x++) {
        cols.push(data.getColumnLabel(x));
    }
    for (x=1; x<cols.length; x++) {
        var control = $('<div>').addClass('main-inner-body-chart-control-item');
        var ctlLabel = $('<label>').attr('for', 'ctl'+cols[x]).html(cols[x]);
        var ctlCheck = $('<input>').attr({'type':'checkbox', 'name':'ctl'+cols[x], 'value':x, 'checked':'checked'}).click(function() {
            updateChart(data, chart);
        });
        $(control).append(ctlLabel).append(ctlCheck);
        $('#main-inner-body-chart-controls').append(control);
    }
}

function updateChart(data, chart) {
    // Show report data
    var view = new google.visualization.DataView(data);
    var hideCols = Array();
    $('#main-inner-body-chart-controls').find('input').not(':checked').each(function() {
        hideCols.push(parseInt($(this).val()));
    });
    view.hideColumns(hideCols);
    // Set chart options
    var options = {
        'title':'Daily Totals Per Category',
        'width':600,
        'height':300,
        'pointSize': 3,
        'interpolateNulls': true,
        'isHtml': true,
    };
    chart.draw(view, options);
}

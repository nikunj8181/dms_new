/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

		// chart function
		initAmChart: function () {
			const hiddenUrl = $('#hiddenUrl').val();

            if (typeof(AmCharts) === 'undefined' || $('#amChart').size() === 0) {
                return;
            }

			$.ajax({
				type: "POST",
				url: hiddenUrl + 'salesorder/dummy',
				success: function (data) {
					const temp = $.parseJSON(data);
					let count = 0;
					let dataObj = {};
					let chartData = [];
					
					// sort data from database
					temp.sort(function (a, b) {
                        a = new Date(a.CreationDate);
                        b = new Date(b.CreationDate);
                        return a>b ? 1 : a<b ? -1 : 0;
                    });
					
					// calculating monthly total and put it in object
					while (count < temp.length) {
						let month = moment(temp[count].CreationDate).month(); 
						let year = moment(temp[count].CreationDate).year();
						
						if (count == 0) {
							dataObj.Total = parseFloat(temp[count].Total);
							dataObj.CreationDate = temp[count].CreationDate;		
						} else {
							let tempMonth = moment(dataObj.CreationDate).month();
							
							if (month == tempMonth) {
								dataObj.Total += parseFloat(temp[count].Total);
							} else {
								dataObj.Total.toFixed(2);
								chartData.push(dataObj);
								dataObj = {};
								dataObj.Total = parseFloat(temp[count].Total);
								dataObj.CreationDate = temp[count].CreationDate;
							}
						}
						count++;
					}
					
					console.log(chartData);

					var chart = AmCharts.makeChart("amChart", {
						type: "serial",
						fontSize: 12,
						fontFamily: "Open Sans",
						dataDateFormat: "YYYY-MM",
						dataProvider: chartData,

						addClassNames: true,
						startDuration: 1,
						color: "#6c7b88",
						marginLeft: 0,

						categoryField: "CreationDate",
						categoryAxis: {
							parseDates: true,
							minPeriod: "MM",
							autoGridCount: false,
							gridCount: 12,
							gridAlpha: 0.1,
							gridColor: "#FFFFFF",
							axisColor: "#555555",
							dateFormats: [{
								"period": "DD",
								"format": "DD"
							}, {
								"period": "WW",
								"format": "MMM DD"
							}, {
								"period": "MM",
								"format": "MM"
							}, {
								"period": "YYYY",
								"format": "YYYY"
							}],
						},

						valueAxes: [{
							id: "a1",
							title: "income",
							gridAlpha: 0,
							axisAlpha: 0
						}],

						graphs: [{
							id: "g1",
							valueField: "Total",
							title: "Income",
							type: "line",
							valueAxis: "a1",
							"lineColor": "#786c56",
							"lineThickness": 1,
							balloonText: "$[[value]]",
							legendValueText: "$[[value]]",
							legendPeriodValueText: "total: $[[value.sum]]",
							"bullet": "round",
							"bulletSizeField": 15,
							"bulletBorderColor": "#786c56",
							"bulletBorderAlpha": 1,
							"bulletBorderThickness": 2,
							"bulletColor": "#000000",
							"showBalloon": true,
							"animationPlayed": true
						}],

						chartCursor: {
							zoomable: false,
							categoryBalloonDateFormat: "MM",
							cursorAlpha: 0,
							categoryBalloonColor: "#e26a6a",
							categoryBalloonAlpha: 0.8,
							valueBalloonsEnabled: false
						},
						legend: {
							bulletType: "round",
							equalWidths: false,
							valueWidth: 120,
							useGraphSettings: true,
							color: "#6c7b88"
						}
					});
				}
			});

			/*
            var chartData = [{
                "date": "2012-01-05",
                "income": 480,
                "townName": "Miami",
                "townName2": "Miami",
                "townSize": 10,
                "latitude": 25.83,
                "duration": 501
            }, {
                "date": "2012-02-06",
                "income": 386,
                "townName": "Tallahassee",
                "townSize": 7,
                "latitude": 30.46,
                "duration": 443
            }, {
                "date": "2012-03-07",
                "income": 348,
                "townName": "New Orleans",
                "townSize": 10,
                "latitude": 29.94,
                "duration": 405
            }, {
                "date": "2012-04-08",
                "income": 238,
                "townName": "Houston",
                "townName2": "Houston",
                "townSize": 16,
                "latitude": 29.76,
                "duration": 309
            }, {
                "date": "2012-05-09",
                "income": 218,
                "townName": "Dalas",
                "townSize": 17,
                "latitude": 32.8,
                "duration": 287
            }];
			*/


        },


        //main function
        init: function () {
            //initialize here something.
			this.initAmChart();
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        },

		// link for div in HTML
		quickLink: function(element) {
			var id = element.id;
			var hiddenUrl = $('#hiddenUrl').val();
			window.location.href = hiddenUrl + id + '/listing';
		}

    };

}();

jQuery(document).ready(function() {
   Custom.init();
});

/***
Usage
***/
//Custom.doSomeStuff();


  $(document).ready(function() {
  $('.example').addClass( 'nowrap' ).DataTable({
  	aLengthMenu: [ 10, 25, 50, 100, "الكل" ],
  	
  	 responsive: true,
    columnDefs: [
    { targets: [-1, -3], className: 'dt-body-right' }
          ],
          dom: 'Bfrtip',
        buttons: 
        [ {extend: 'copy', text: 'نسخ' },
        {extend: 'excel', text: 'تصدير إلى إكسل' },
        'pdf', 'print']
        

  });

});

  // $('.example').DataTable( {
  //       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
  //   } );


// Start Code Check  Select All

function toggle(source,clas) {

      var checkboxes = document.querySelectorAll('input[class="'+clas+'"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
// End Code Check  Select All

// Start Code Bar chart
/*new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});*/
// End Code Bar chart

// Start Code line chart
//
// new Chart(document.getElementById("line-chart"), {
//   type: 'line',
//   data: {
//     labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
//     datasets: [{
//         data: [86,114,106,106,107,111,133,221,783,2478],
//         label: "Africa",
//         borderColor: "#3e95cd",
//         fill: false
//       }, {
//         data: [282,350,411,502,635,809,947,1402,3700,5267],
//         label: "Asia",
//         borderColor: "#8e5ea2",
//         fill: false
//       }, {
//         data: [168,170,178,190,203,276,408,547,675,734],
//         label: "Europe",
//         borderColor: "#3cba9f",
//         fill: false
//       }, {
//         data: [40,20,10,16,24,38,74,167,508,784],
//         label: "Latin America",
//         borderColor: "#e8c3b9",
//         fill: false
//       }, {
//         data: [6,3,2,2,7,26,82,172,312,433],
//         label: "North America",
//         borderColor: "#c45850",
//         fill: false
//       }
//     ]
//   },
//   options: {
//     title: {
//       display: true,
//       text: 'World population per region (in millions)'
//     }
//   }
// });
// // End Code line chart
//
// // Start Code mixed chart
// new Chart(document.getElementById("mixed-chart"), {
//     type: 'bar',
//     data: {
//       labels: ["1900", "1950", "1999", "2050"],
//       datasets: [{
//           label: "Europe",
//           type: "line",
//           borderColor: "#8e5ea2",
//           data: [408,547,675,734],
//           fill: false
//         }, {
//           label: "Africa",
//           type: "line",
//           borderColor: "#3e95cd",
//           data: [133,221,783,2478],
//           fill: false
//         }, {
//           label: "Europe",
//           type: "bar",
//           backgroundColor: "rgba(0,0,0,0.2)",
//           data: [408,547,675,734],
//         }, {
//           label: "Africa",
//           type: "bar",
//           backgroundColor: "rgba(0,0,0,0.2)",
//           backgroundColorHover: "#3e95cd",
//           data: [133,221,783,2478]
//         }
//       ]
//     },
//     options: {
//       title: {
//         display: true,
//         text: 'Population growth (millions): Europe & Africa'
//       },
//       legend: { display: false }
//     }
// });
// // End Code mixed chart
//
//
// // Start Code pie chart
// 	new Chart(document.getElementById("pie-chart"), {
//     type: 'pie',
//     data: {
//       labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
//       datasets: [{
//         label: "Population (millions)",
//         backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
//         data: [2478,5267,734,784,433]
//       }]
//     },
//     options: {
//       title: {
//         display: true,
//         text: 'Predicted world population (millions) in 2050'
//       }
//     }
// });
// // End Code pie chart
//
// // Start Code plar chart
// 	/*new Chart(document.getElementById("polar-chart"), {
//     type: 'polarArea',
//     data: {
//       labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
//       datasets: [
//         {
//           label: "Population (millions)",
//           backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
//           data: [2478,5267,734,784,433]
//         }
//       ]
//     },
//     options: {
//       title: {
//         display: true,
//         text: 'Predicted world population (millions) in 2050'
//       }
//     }
// }); */
// // End Code plar chart
//
// // Start Code doughnut chart
// 	new Chart(document.getElementById("doughnut-chart"), {
//     type: 'doughnut',
//     data: {
//       labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
//       datasets: [
//         {
//           label: "Population (millions)",
//           backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
//           data: [2478,5267,734,784,433]
//         }
//       ]
//     },
//     options: {
//       title: {
//         display: true,
//         text: 'Predicted world population (millions) in 2050'
//       }
//     }
// });
// 	// End Code document chart

  // start code clock 
  function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
  // End code clock 



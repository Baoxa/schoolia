function drawGraph(dataArr){
    var canvas = document.getElementById("canvas");
    var context = canvas.getContext("2d");

    var graph_top = 25;
    var graph_bottom = 375;
    var graph_left = 25;
    var graph_right = 475;

    var graph_height = 350;
    var graph_width = 700;

    var arrayLen = dataArr.length;

    var largest = 0;
    for(var i = 0; i < arrayLen; i++) {
        if(dataArr[i] > largest) {
            largest = dataArr[i];
        }
    }

    context.clearRect(0, 0, 500, 400);
    context.font = "16px Arial";

    // axis x et y
    context.beginPath();
    context.moveTo(graph_left, graph_bottom);
    context.lineTo(graph_right, graph_bottom);
    context.lineTo(graph_right, graph_top);
    context.stroke();

    // lignes de réference
    context.beginPath();
    context.strokeStyle = "grey";
    context.moveTo(graph_left, graph_top);
    context.lineTo(graph_right, graph_top);

    // nombre de connexions
    context.fillText(largest, graph_right + 15, graph_top);
    context.stroke();

    // ligne 1/4
    context.beginPath();
    context.moveTo(graph_left, (graph_height) / 4 + graph_top);
    context.lineTo(graph_right, (graph_height) / 4 + graph_top);
    // valeurs pour le nombre de connexions
    context.fillText(largest / 4 * 3, graph_right + 15, (graph_height) / 4 + graph_top);
    context.stroke();

    // ligne 2/4
    context.beginPath();
    context.moveTo(graph_left, (graph_height) / 2 + graph_top);
    context.lineTo(graph_right, (graph_height) / 2 + graph_top);
    // valeurs pour le nombre de connexions
    context.fillText(largest / 2, graph_right + 15, (graph_height) / 2 + graph_top);
    context.stroke();


    // ligne 3/4
    context.beginPath();
    context.moveTo(graph_left, (graph_height) / 4 * 3 + graph_top);
    context.lineTo(graph_right, (graph_height) / 4 * 3 + graph_top);
    // valeurs pour le nombre de connexions
    context.fillText( largest / 4, graph_right + 15, (graph_height) / 4 * 3 + graph_top);
    context.stroke();


    // titres
    context.fillText("Jour de la semaine", graph_right / 3, graph_bottom + 50);
    context.fillText("Nombre de connexions", graph_right + 30, graph_height / 2);

    context.beginPath();
    context.lineJoin = "bevel";
    context.strokeStyle = "red";
    context.lineWidth = 3;

    context.moveTo(graph_left, (graph_height - dataArr[0] / largest * graph_height) + graph_top);
    // valeurs pour le jour de la semaine
    context.fillText("1", 15, graph_bottom + 25);
    for(var i = 1; i < arrayLen; i++){
        context.lineTo(graph_right / arrayLen * i + graph_left, (graph_height - dataArr[i] / largest * graph_height) + graph_top);
        // valeurs pour le jour de la semaine
        context.fillText((i + 1), graph_right / arrayLen * i, graph_bottom + 25);
    }
    context.stroke();
}

// test
var testValues = [0, 4, 1, 6, 2, 7, 8];

drawGraph(testValues);

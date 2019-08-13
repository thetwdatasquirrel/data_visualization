<!DOCTYPE html>
<meta charset="utf-8">
<style>

path {
  fill: #ccc;
  stroke: #fff;
  stroke-width: .5px;
}

path:hover {
  fill: red;
}

</style>
<body>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="https://d3js.org/topojson.v1.min.js"></script>
<script>

var width = 960,
    height = 500;

var path = d3.geo.path();

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height);

var url = "topojson/counties.json"
d3.json(url, function(error, topodata) {
  if (error) throw error;
  
  console.log("topojson", topodata);
  console.log("AA", topojson.feature(topodata, topodata.objects["map"]));
  var features = topojson.feature(topodata, topodata.objects["map"]).features;
  var path = d3.geo.path().projection(
    d3.geo.mercator().center([121,24]).scale(6000)
  );
  
  d3.select("svg").selectAll("path").data(features)
    .enter().append("path").attr("d",path);
});

</script>

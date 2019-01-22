# d3-legend

Originally (C) 2012 ziggy.jonsson.nyc@gmail.com


## Usage

Add this script to your html and it will define `d3.legend`.

```
var svg = d3.select("body").append("svg")...

// add a data-legend attribute to your path
cities.append('path')
    .attr('class', 'line')
    .attr('d', line)
    .attr('data-legend', 'cities')

// add legend to svg.
var legend = svg.append('g')
    .attr('class', 'legend')
    .attr('transform', 'translate(50, 30)')
    .style('font-size', '12px')
    .call(d3.legend)
```

Alternatively, use require with browserify:

`npm install d3-legend`

```JavaScript
var d3 = require('d3');
var d3legend = require('d3-legend')(d3);
```

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
   <title>VFotos</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="alternate" type="application/rss+xml" title="RSS feed" href="http://www.v.bidala.org/rss.php" />
<script type="text/javascript" src="_js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="_js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        alben = $('#alben').dataTable( {
                "bPaginate": false,
                "bLengthChange": false,
                "bSort": true,
                "bFilter":false,
                "bInfo":false,
                "bStateSave": true,
                "aaSorting": [[ 1, 'desc' ]]

        });

} );
</script>

<style type="text/css">
<!--
body {
        background-color: #555;
        font-family:"Verdana";
        font-size:14px;
        color: #fff;
        width:30em;
        border:1px solid #FF3F00;
        margin-left:auto;
        margin-right:auto;
        padding:1em 2em;
}
a {
        color:#fff;
        text-decoration:underline;
}
h1 {
        text-align: center;
        font-weight: normal;
}
th {
        text-align: left;
        padding-right: 2em;
        border-bottom: 1px solid #eee;
        border-right:1em solid transparent;
}
.neu, .neu a {
        color:#FF3F00;
}
.sorting_asc {
        background: url('_js/asc.png') no-repeat center right;
        cursor: n-resize;
}

.sorting_desc {
        background: url('_js/desc.png') no-repeat center right;
        cursor: s-resize;
}

.sorting {
        background: url('_js/sort.png') no-repeat center right;
        cursor: n-resize;
}
.footer {
       text-align:right;
       margin-top:1em;
}
-->
  </style>
 </head>
<body>

<h1><span class="neu">V</span>Fotos</h1>

<p>zusammenschau. sortierung alphabetisch
oder chronologisch, jeweils auf- und absteigend.  <span class="neu">neu.</span></p>

<table id="alben">
<thead>
        <tr>
                <th title="nach Namen sortieren">Album</th>
                <th title="nach Datum sortieren">Datum</th>
        </tr>
</thead>

<tbody>

<?php

foreach(scandir('.') as $dir) {
  if ($dir != "." && $dir != ".." && !preg_match('/^_.*/', $dir) &&
is_dir($dir)) {
        $stat = stat($dir);
        $date = date("Y-m-d",$stat[9]);
        if((time() - $stat[9]) < 60*60*24*30) {
                $class = "neu";
        } else { $class = ""; }

        echo "        <tr class=\"$class\">\n";
                echo "                <td><a href=\"$dir\">$dir</a>\n";
                echo "                </td><td>$date</td>\n        </tr>\n";
  }
}

?>
</tbody>
</table>
<br>
<div class="footer"><a rel="license"
href="http://creativecommons.org/licenses/by-sa/3.0/"><img alt="Creative Commons License" style="border-width: 0pt;" src="cc-by-sa-80x15px.png"></a> Vitus Angermeier</div><br>

</body></html>
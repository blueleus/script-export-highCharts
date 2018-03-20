<?php

$json = <<<EOD
{
  title: {
      text: 'Pie point CSS'
  },
  xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
          ['Apples', 29.9, false],
          ['Pears', 71.5, false],
          ['Oranges', 106.4, false],
          ['Plums', 129.2, false],
          ['Bananas', 144.0, false],
          ['Peaches', 176.0, false],
          ['Prunes', 135.6, true, true],
          ['Avocados', 148.5, false]
      ],
      showInLegend: true
  }],
  credits: {enabled: false},
  exporting: {enabled: false}
}
EOD;

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, 'http://192.168.0.8:8099');
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, array('infile' => $json, 'type' => 'png') );

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

$fichero = time().".png";
file_put_contents($fichero, $result);

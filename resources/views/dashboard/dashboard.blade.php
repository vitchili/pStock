

<div><script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    O gráfico acima relaciona o nome do produto com a quantidade em estoque.
  </p>

  <table id="datatable">
    <thead>
      <tr>
        <th></th>
        @foreach($produtos as $produto)
            <th>{{$produto->nome}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>

        @foreach($produtos as $produto)
        <td>{{$produto->quantidade}}</td>
        @endforeach

      </tr>
    </tbody>
  </table>
</figure>

<script>
var chart = new Highcharts.chart('container', {
    data: {
      table: 'datatable'
    },
    chart: {
      type: 'column'
    },
    title: {
      text: 'Produtos em estoque'
    },
    subtitle: {
      text:
        ''
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      allowDecimals: false,
      title: {
        text: 'Quantidade'
      }
    },
    tooltip: {
      formatter: function () {
        return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
    }
  });
</script>
</div>


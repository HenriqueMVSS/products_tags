// $("#btnExport").click(function(e) {
//     var a = document.createElement('a');
//     var data_type = 'data:application/vnd.ms-excel';
//     var table_div = document.getElementById('dvData');
//     var table_html = table_div.outerHTML.replace(/ /g, '%20');
//     a.href = data_type + ', ' + table_html;
//     a.download = 'Produtos.xls';
//     a.click();
//     e.preventDefault();
//   });

$(document).ready(function(){
  $("#btnExport").click(function(e) {
    e.preventDefault();
    var table_div = document.getElementById('dvData');
    var table_html = new Blob(['\ufeff' + table_div.outerHTML],{type:'application/vnd.ms-excel'});
    var url = window.URL.createObjectURL(table_html)

    var a = document.createElement('a');

    a.href = url;
    a.download = 'Produtos';
    a.click();
    
  });
})
 
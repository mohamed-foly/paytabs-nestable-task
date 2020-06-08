var base_url = $('meta[name="url"]').attr('content');

function makeSelectBox(params) {
    var html = [];
    html.push('<select class="categories-select" onchange="getAjaxCategories(this.value);">');

    $(params).each(function() { 
        console.log(this);
    	html.push("<option value='"+this.id+"'>"+this.name  +"</option>") 
    });

    html.push('</select>');      
    return html.join("\n");
}

$(function() {
    getAjaxCategories(null)
});

function getAjaxCategories(sel)
{
    $.ajax({
        type: "POST",
        url: base_url + "/category/getAjaxCategories",
        data: {
          root_category:sel
        },
        cache: false,
        dataType:"json",
        success: function(result){
            if(result.length < 1){
                alert("No categories found");
                return;
            }
            $(".nestable").append(makeSelectBox(result));
        },
        error: function(jqXHR, textStatus, errorThrown) { 
          swal({
              icon: "error",
              title: "Something wrong",
              text: errorThrown
          });
        }
  });
}
function addElement()
{
  
  var div = document.getElementById("options");
  var counter = document.getElementById("options").getElementsByClassName("form-control").length;

  var newRow = document.createElement("div");
      newRow.setAttribute("class","row");
      newRow.setAttribute("id","inputfield");
      div.appendChild(newRow);

  var addCol = document.createElement("div");
      addCol.setAttribute("class", "col-sm-1");
      newRow.appendChild(addCol);

  var newCol = document.createElement("div");
      newCol.setAttribute("class", "col-sm-10");
      newRow.appendChild(newCol);

  var newFormGroup = document.createElement("div");
      newFormGroup.setAttribute("class", "form-group");
      newCol.appendChild(newFormGroup);
  
 

  var newInput = document.createElement("input");
      newInput.setAttribute("type", "text");
      newInput.setAttribute("class", "form-control");
      
      newInput.setAttribute("placeholder", "Ex: Options " +(counter+1));
      newInput.setAttribute("name", "option[]");
      newFormGroup.appendChild(newInput);

  var newDiv = document.createElement("div");
      newDiv.setAttribute("class", "col-sm-1");
      newRow.appendChild(newDiv);
  
  var newButton = document.createElement("a");
      newButton.setAttribute("class", "btn btn-danger");
      newButton.setAttribute("onclick", "remove()");
      newDiv.appendChild(newButton);
  var icon = document.createElement("i");
      icon.setAttribute("class", "fas fa-minus-square");
      newButton.appendChild(icon);    
}

function remove(){
  var div = document.getElementById("inputfield");
  div.remove();
}

/*$('form').submit(function() {
    var name = $('$name').val();
    var description = $('description').val();
    alert("Proslo");
    $.ajax({
      url: "/permission/create",
      data: {
          name: name, 
          description: description,
      },
      type: "POST",
      dataType : "json",
      success: function( json ) {
          console.log("proslo");
      },
      error: function( xhr, status, errorThrown ) {
          console.log( "Sorry, there was a problem!" );
      }
    });
  json = '';
  return false;
});*/






class Info {
   getOptions(data, options, select, table) {
       let app = this;
       for(var i=0; i < data.length; i++) { 
          if(select == 'selected' && table == 'groups') {
             var value = data[i].group_id;          

          } else if (select == 'selected' && table == 'users') {
             var value = data[i].user_id; 

          } else {
             var value = data[i].id;
          }
          
          if(table == 'groups') {
             var text = data[i].title;
          }

          if(table == 'users') {
             var text = data[i].name; 
          }

          options.push( 
          {
            value: value,
            text: text
          });           
        }
    }

    moveItems(options, listoptions, lstbxFrom, lstbxTo) {
      var varFromBox = document.getElementById(lstbxFrom);
      var varToBox = document.getElementById(lstbxTo);
               
        if ((varFromBox != null) && (varToBox != null)) 
        { 
          if(varFromBox.length < 1) 
          {
           alert('There are no items in the source ListBox');
           return false;
          }
          if(varFromBox.options.selectedIndex == -1) // when no Item is selected the index will be -1

          {
            alert('Please select an Item to move');
            return false;
          }

          while ( varFromBox.options.selectedIndex >= 0 ) 
          { 
            
            if(lstbxFrom == "listBox1") {
              listoptions.push(          
                {
                    value: varFromBox.options[varFromBox.options.selectedIndex].value,
                    text: varFromBox.options[varFromBox.options.selectedIndex].text
                });          

                varFromBox.remove(varFromBox.options.selectedIndex); //Remove the item from Source Listbox
            } else {
               options.push(          
                {
                    value: varFromBox.options[varFromBox.options.selectedIndex].value,
                    text: varFromBox.options[varFromBox.options.selectedIndex].text
                });
                varFromBox.remove(varFromBox.options.selectedIndex); //Remove the item from Source Listbox
            }
            
          }
      }

      return false; 
    
    }
}

export default Info;
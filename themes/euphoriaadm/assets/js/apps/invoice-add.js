function deleteItemRow() {
    deleteItem = document.querySelectorAll('.delete-item');
    for (var i = 0; i < deleteItem.length; i++) {
        deleteItem[i].addEventListener('click', function() {
            this.parentElement.parentNode.parentNode.parentNode.remove();
        })
    }
}

function selectableDropdown(getElement, myCallback) {
  var getDropdownElement = getElement;
  for (var i = 0; i < getDropdownElement.length; i++) {
      getDropdownElement[i].addEventListener('click', function() {
        console.log(this)
        console.log(this.parentElement.parentNode.querySelector('.dropdown-toggle > .selectable-text'));
        console.log(this.parentElement);

        var dataValue = this.getAttribute('data-value');
        var dataImage = this.getAttribute('data-img-value');

        if(dataValue === null && dataImage === null) {
          console.warn('No attributes are defined. Kindly define one attribute atleast')
        }
        
        if (dataValue != '' && dataValue != null) {
          this.parentElement.parentNode.querySelector('.dropdown-toggle > .selectable-text').innerText = dataValue;
        }

        if (dataImage != '' && dataImage != null) {
          this.parentElement.parentNode.querySelector('.dropdown-toggle > img').setAttribute('src', dataImage );
        }

        var dropdownValues = {dropdownValue:dataValue, dropdownImage:dataImage};
        myCallback(dropdownValues);
      })
  }
}


  $(".item-table tbody").append($html);
  deleteItemRow();

});


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      //valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

const select = document.getElementById("status");
const anak = document.getElementById("nama_anak");
const pasangan = document.getElementById("nama_pasangan");
const add = document.getElementById("add");
const remove = document.getElementById("remove");
const tanak = document.getElementById("tambah-anak");



select.addEventListener("change", function() {
  if (select.value === "bujang") {
    anak.style.display = "none";
    pasangan.style.display = "none";
    add.style.display = "none";
    tanak.style.display = "none";
  } else if (select.value === "Janda") {
    anak.style.display = "block";
    pasangan.style.display = "block";
    add.style.display = "block";
    tanak.style.display = "block";
  } else {
    anak.style.display = "block";
    pasangan.style.display = "block";
    add.style.display = "block";
    tanak.style.display = "block";
  } 
});

  var inputFields = document.getElementById("inputFields");
  var inputCount = inputFields.children.length;

  if (inputCount > 1) {
    remove.style.display = "block";
  }

//Tahun mula dan akhir kerja:

var select1 = document.getElementById("tahun_mula");
var select2 = document.getElementById("tahun_akhir");

// Get the current year
var currentYear = new Date().getFullYear();

// Loop from 1970 to the current year
for (var i = 1970; i <= currentYear; i++) {
  // Create an option element for each year
  var option = document.createElement("option");
  var option1 = document.createElement("option");
  option.value = i;
  option.text = i;
  option1.value = i;
  option1.text = i;
  // Add the option to the select element
  select1.appendChild(option);
  select2.appendChild(option1);
}
var tahunlulus = document.getElementById("tahun_lulus");

      // Loop from 1970 to the current year
      for (var i = 1970; i <= currentYear; i++) {
        // Create an option element for each year
        var option2 = document.createElement("option");
        option2.value = i;
        option2.text = i;
        
        // Add the option to the "Tahun Mula" select element
        tahunlulus.appendChild(option2);
      }

///////////////////////////////////
//Tambah dan Buang input pada senarai Keluarga
$(document).ready(function () {
  // Attach click event handler to a parent element using event delegation
  $('.paste-keluarga').on('click', '.remove', function () {
      $(this).closest('.inputFields').remove();
  });

  $('#add').click(function() {
      addInputFields();
  });

  function addInputFields() {
      $('.paste-keluarga').append('<div class="inputFields">\
                    <div class="input1">\
                        <p class="janda"><input autocomplete="off" placeholder="Nama Pasangan" type="text" class="nama_pasangan" name="nama_pasangan[]"></p>\
                        <p class="anak1"><input autocomplete="off" placeholder="Nama Anak" type="text" class="nama_anak" name="nama_anak[]"></p>\
                        <button class="remove" type="button">Remove Fields</button>\
                    </div>\
                </div>');
  }
});


///////////////////////////////////////


//Tambah dan Buang input pada kelulusan

// Define a counter variable to keep track of the number of input fields
var counter = 1;

// Get a reference to the "Add Fields" button
var addButton = document.getElementById("add1");

// Add a click event listener to the "Add Fields" button
addButton.addEventListener("click", function () {

  // Get a reference to the input fields container
  var inputFields = document.getElementById("inputFields1");
  var inputCount = inputFields.children.length;
  var limit = 8;
  
  // Create a new input field group
  if(inputCount < limit){
      var newInput = document.createElement("div");
      newInput.id = "input" + counter;

      // Create the HTML for the new input field group
      var html = `
        <label for="kelulusan${counter}">Kelulusan:</label>
        <select id="kelulusan${counter}" name="kelulusan[]">
          <option value="Sijil">Sijil</option>
          <option value="SPM">SPM</option>
          <option value="STPM">STPM</option>
          <option value="Diploma">Diploma</option>
          <option value="Ijazah Sarjana Muda">Ijazah Sarjana Muda</option>
          <option value="Ijazah Sarjana">Ijazah Sarjana</option>
          <option value="Master">Master</option>
          <option value="PhD">PhD</option>
        </select>
        <p><input autocomplete="off" placeholder="Bidang/Nama sijil" type="text" id="bidang${counter}" name="bidang[]"></p>
        <label for="tahun_lulus${counter}">Tahun:</label>
        <select id="tahun_lulus${counter}" name="tahun_lulus[]"></select>
        <button type="button" onclick="removeInputFields1(this)">Remove Fields</button>
      `;
      
      // Set the HTML of the new input field group
      newInput.innerHTML = html;

      // Append the new input field group to the input fields container
      inputFields.appendChild(newInput);

      // Get a reference to the new input field group's year select elements
      var tahunlulus = document.getElementById("tahun_lulus" + counter);

      // Get the current year
      var currentYear = new Date().getFullYear();

      // Loop from 1970 to the current year
      for (var i = 1970; i <= currentYear; i++) {
        // Create an option element for each year
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        
        // Add the option to the "Tahun Mula" select element
        tahunlulus.appendChild(option);
      }
      counter++;
  }
});

// Define a function to remove input fields
function removeInputFields1(event) {
  var inputFields = document.getElementById("inputFields1");
  var inputCount = inputFields.children.length;
  // Get the parent element of the input fields to be removed
  var parent = event.parentNode;
  // Remove the parent element from the DOM
  if (inputCount > 1) {
    inputFields.removeChild(parent);
  }
}

//Pengalaman kerja
var addkerja = document.querySelector('#add-more-kerja');
var formkerja = document.querySelector('#form-kerja');
var kira = 1;

addkerja.addEventListener('click', function(){
  kira++;

  var newForm = document.createElement('div');
  newForm.id = "idkerja" + kira;
  newForm.innerHTML = `
    <p>
      <input autocomplete="off" placeholder="Agensi" type="text" id="tempoh_khidmat_${kira}" name="agensi[]]">
    </p>
    <label for="jawatan_${kira}">Jawatan:</label>
    <select id="jawatan_${kira}" name="jawatan[]">
      <option value="">Pilih Jawatan</option>
      <option value="Pegawai Eksekutif">Pegawai Eksekutif</option>
      <option value="Pegawai Kewangan">Pegawai Kewangan</option>
      <option value="Pegawai Teknikal">Pegawai Teknikal</option>
      <option value="Pegawai Sains">Pegawai Sains</option>
      <option value="Pegawai Kesihatan">Pegawai Kesihatan</option>
      <option value="Pegawai Pentadbiran">Pegawai Pentadbiran</option>
      <option value="Juruteknik">Juruteknik</option>
      <option value="Penolong Pegawai Kesihatan">Penolong Pegawai Kesihatan</option>
      <option value="Pembantu Tadbir">Pembantu Tadbir</option>
      <option value="Lain-lain">Lain-lain</option>
    </select>
    <label for="tahun_mula_${kira}">Tahun Mula:</label>
    <select id="tahun_mula_${kira}" name="tahun_mula[]"></select>
    <label for="tahun_akhir_${kira}">Tahun Akhir:</label>
    <select id="tahun_akhir_${kira}" name="tahun_akhir[]"></select>
    <button id="remove-button_${kira}" type="button">Remove</button>
  `;

      // Append the new input field group to the input fields container
      formkerja.appendChild(newForm);
      // Get a reference to the new input field group's year select elements
      var tahunmula = document.getElementById("tahun_mula_" + kira);
      var tahunakhir = document.getElementById("tahun_akhir_" + kira);

      // Loop from 1970 to the current year
      for (var i = 1970; i <= currentYear; i++) {
        // Create an option element for each year
        var optionMula = document.createElement("option");
        optionMula.value = i;
        optionMula.text = i;
        
        var optionAkhir = document.createElement("option");
        optionAkhir.value = i;
        optionAkhir.text = i;

        // Add the option to the "Tahun Mula" select element
        tahunmula.appendChild(optionMula);
        tahunakhir.appendChild(optionAkhir);
      }
  // Get a reference to the "remove" buttons and add a click event listener
  var removeButton = document.getElementById(`remove-button_${kira}`);
  removeButton.addEventListener('click', removekerja);
});
function removekerja(event){
  var inputFields = document.getElementById("form-kerja");
  var inputCount = inputFields.children.length;
  var button = event.target;
  var parentElement = button.parentNode;

  if (inputCount > 1) {
    parentElement.parentNode.removeChild(parentElement);
  }
  
}



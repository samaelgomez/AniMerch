function renderProduct(figure) {
    let product = `
    <div class="profile">
      <div class="profile__image"><a href="/?page=details"><img src="${figure.image}"></a></div>
      <div class="profile__info">
        <h4>${figure.name}</h4>
      </div>
      <div class="profile__stats">
        <p class="profile__stats__title"></p>
        <h5 class="profile__stats__info"></h5>
      </div>
      <div class="profile__stats">
        <h4 class="profile__stats__info">${figure.price}€</h4>
      </div>
      <div class="profile__cta"><a class="button">Add to your cart</a></div>
    </div>`;

    $('<section></section>').attr({'class':'results-section results--grid'}).html(product).appendTo('#loadedProducts');
}

function loadFilters() {
    let filters = `
    <br>
    <br>
    <br>
    <h6>Filters</h6>
      <div class="filters">
        <h5 class="filters__title">Brand</h5>
        <div class="filters__item">
          <select name="brand" id="brand">
            <option value="Any">Any</option>
            <option value="Alter">Alter</option>
            <option value="Aniplex">Aniplex</option>
            <option value="GoodSmile">Good Smile</option>
            <option value="Kadokawa">Kadokawa</option>
          </select>
          <br/>
        </div>
      </div>
      <div class="filters">
        <h5 class="filters__title">Franchise</h5>
        <div class="filters__item">
          <select name="franchise" id="franchise">
            <option value="Any">Any</option>
            <option value="Bleach">Bleach</option>
            <option value="BNHA">Boku no Hero</option>
            <option value="Naruto">Naruto</option>
            <option value="Nier">Nier</option>
            <option value="OnePiece">One Piece</option>
            <option value="Vocaloid">Vocaloid</option>
          </select>
          <br/>
        </div>
      </div>
      <div class="profile__cta" id="filter_button"><a class="button">Filter</a></div>
      <div class="profile__cta" id="reset_filters"><a class="button">Reset filters</a></div>`;

    $('<section></section>').attr({'class':'filter-section'}).html(filters).appendTo('#loadedFilters');
}

// function deleteFromArray(array,to_delete,type) {
//   let index = array.map(function(e) { return e.type; }).indexOf(type);
//   if (index >-1) {
//       let indexFilter = array[index].filters.indexOf(to_delete)
//       array[index].filters.splice(indexFilter,1)
//       return array
//   }
// }

// function addFilterEvent(array,eventType) {
//   array.forEach(value => {
//       value.addEventListener("click",function(e) {
//           if (e.target.checked) {
//               let exists = filterArray.some(filter=>filter.type == eventType);
//               if (!exists) {
//                   filterArray = [...filterArray,{type:eventType, filters:[e.target.value]}]
//               } else {
//                   let index = filterArray.map(function(e) { return e.type; }).indexOf(eventType);
//                   filterArray[index].filters = [...filterArray[index].filters,e.target.value]
//               }
//           }else{
//               filterArray = deleteFromArray(filterArray,e.target.value,eventType)
//           }
//       })
//   });
// }

// function makePetition() {
//   petition = "";
//   filterArray.forEach((types,index1) => {
//       types.filters.forEach((filtered,index2)=>{
//           petition += ` ${types.type} = ${filtered} `
//           if (types.filters.length-1 === index2) {
//               if (filterArray.length-1 === index1) {
//                   petition +=";"
//               }else{
//                   petition +="AND"
//               }
//           } else {
//               petition +="OR"
//           }
//       })
//   });
// }

function loadProducts() {
  $.ajax({
      url: 'module/shop/controller/controller_shop.php',
      type: 'POST',
      dataType: "json",
      data: {category: localStorage.getItem("category"), brand: localStorage.getItem("brand"), franchise: localStorage.getItem("franchise")},
      success: function(response) {
          response.forEach(renderProduct);
      },
      error: function(e) {
          console.log(e);
      }
  })
}

$(document).ready(function () {
    localStorage.removeItem("brand");
    localStorage.removeItem("franchise");
    $("body").on("click", ".category", function() {
      localStorage.setItem('category', this.getAttribute('id'));
    });
    $('<h2></h2>').html(localStorage.getItem("category")).appendTo('#figure_title');
    // let filterArray=[];
    // let petition="";
    loadFilters();
    loadProducts();
    $('#brand').change(function(){
      localStorage.setItem('brand', $(this).val());
    })
    $('#franchise').change(function(){
      localStorage.setItem('franchise', $(this).val());
    })
    // let brands = document.querySelectorAll("#brand")
    // addFilterEvent(brands,"brand")
    // let franchises = document.querySelectorAll("#franchise")
    // addFilterEvent(franchises,"franchise")
    $("body").on("click", "#reset_filters", function() {
      localStorage.removeItem("brand");
      localStorage.removeItem("franchise");
    });
    $("body").on("click", "#filter_button", function() {
      // makePetition();
      $('#loadedProducts').empty();
      loadProducts();
    });
});
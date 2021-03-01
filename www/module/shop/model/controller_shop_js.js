function renderProduct(figure) {
  let product = `
  <div class="profile">
    <div class="profile__image" id="${figure.name}"><img src="${figure.image}"></div>
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

function renderDetails(figure) {

  console.log(figure);
  let product = `
  <div class="products" id="details_container">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div>
            <img src="${figure.image}" alt="" class="img-fluid wc-image">
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4 col-xs-6">
              <div>
                <img src="view/images/product-1-370x270.jpg" alt="" class="img-fluid">
              </div>
              <br>
            </div>
            <div class="col-sm-4 col-xs-6">
              <div>
                <img src="view/images/product-2-370x270.jpg" alt="" class="img-fluid">
              </div>
              <br>
            </div>
            <div class="col-sm-4 col-xs-6">
              <div>
                <img src="view/images/product-3-370x270.jpg" alt="" class="img-fluid">
              </div>
              <br>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-xs-12">
          <form action="#" method="post" class="form">
            <h2>Lorem ipsum dolor sit amet.</h2>

            <br>

            <p class="lead">
              <small><del> $999.00</del></small><strong class="text-primary">$779.00</strong>
            </p>

            <br>

            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ratione molestias maxime odio. Provident ratione vero, corrupti, optio laborum aut!
            </p>

            <br> 

            <div class="row">
              <div class="col-sm-4">
                <label class="control-label">Extra 1</label>
                <div class="form-group">
                  <select class="form-control">
                    <option value="0">18 gears</option>
                    <option value="1">21 gears</option>
                    <option value="2">27 gears</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-8">
                <label class="control-label">Quantity</label>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="1">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>`;

  $('<div></div>').html(product).appendTo('#loadedDetails');
}

function loadDetails(figureName) {
  $('.variation').empty();
  $('#loadedFilters').empty();
  $('#loadedProducts').empty();

  ajaxPromise("module/shop/controller/controller_shop.php", "POST", {data: {fname: figureName}})
  .then((data)=>{
    renderDetails(data);
  })
  .catch((e)=>{
      console.log(e)
  })

  // $.ajax({
  //     url: 'module/shop/controller/controller_shop.php',
  //     type: 'POST',
  //     dataType: "json",
  //     data: {fname: figureName},
  //     success: function(response) {
  //         renderDetails(response);
  //     },
  //     error: function(e) {
  //         console.log(e);
  //     }
  // })
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
    $("body").on("click", ".profile__image", function() {
      loadDetails(this.getAttribute('id'));
    });
});
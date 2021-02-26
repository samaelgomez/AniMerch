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
    <h6>Filters</h6>
      <div class="filters">
        <h5 class="filters__title">Dog Type</h5>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-1" type="checkbox"/>
            <label for="checkbox-1">Puppy<span class="box"></span>
              <div class="tooltip top" data-tooltip="Younger than 18 months."><span><i class="icon-info"></i></span></div>
            </label>
          </div><span class="badge status-primary">10</span>
        </div>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-2" type="checkbox" checked="checked"/>
            <label for="checkbox-2">Young<span class="box"></span></label>
          </div><span class="badge status-primary">5</span>
        </div>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-3" type="checkbox"/>
            <label for="checkbox-3">Adult<span class="box"></span></label>
          </div><span class="badge status-primary">20</span>
        </div>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-4" type="checkbox"/>
            <label for="checkbox-4">Senior<span class="box"></span></label>
          </div><span class="badge status-primary">8</span>
        </div>
      </div>
      <div class="filters">
        <h5 class="filters__title">Dog Size</h5>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-5" type="checkbox"/>
            <label for="checkbox-5">Small<span class="box"></span></label>
          </div><span class="badge status-primary">9</span>
        </div>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-6" type="checkbox" checked="checked"/>
            <label for="checkbox-6">Medium<span class="box"></span></label>
          </div><span class="badge status-primary">12</span>
        </div>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-7" type="checkbox"/>
            <label for="checkbox-7">Large<span class="box"></span></label>
          </div><span class="badge status-primary">17</span>
        </div>
        <div class="filters__item">
          <div class="checkbox">
            <input id="checkbox-8" type="checkbox"/>
            <label for="checkbox-8">XL<span class="box"></span></label>
          </div><span class="badge status-primary">3</span>
        </div>
      </div>`;

    $('<section></section>').attr({'class':'filter-section'}).html(filters).appendTo('#loadedFilters');
}

function loadProducts() {
    $.ajax({
        url: 'module/shop/controller/controller_shop.php',
        type: 'POST',
        dataType: "json",
        data: {category: localStorage.getItem("category")},
        success: function(response) {
            response.forEach(renderProduct);
        },
        error: function(e) {
            console.log(e);
        }
    })
}

$(document).ready(function () {
    $("body").on("click", ".category", function() {
        localStorage.setItem('category', this.getAttribute('id'));
    });
    $('<h2></h2>').html(localStorage.getItem("category")).appendTo('#figure_title');
    loadFilters();
    loadProducts();
});
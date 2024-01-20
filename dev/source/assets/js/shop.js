const Shop = {
  scriptURL: 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js',
  options: {
    "product": {
        iframe: false,
        variantId: "all",
        text: {
            button: 'Buy Now!',
            outOfStock: 'Sold Out',
            unavailable: 'Unavailable',
        },
        classes: {
            button: 'tag sticker push'
        },
        "buttonDestination": "checkout",
        "contents": {
            "img": false,
            "title": false,
            "imgWithCarousel": false,
            "variantTitle": false,
            "description": false,
            "buttonWithQuantity": false,
            "quantity": false,
            "price": false
        }
    },
    "cart": {
      iframe: false,
      "contents": {
        title: false,
        lineItems: false,
        footer: false,
        note: false,
        discounts: false,
      }
    },
    "lineItem": {},
    "toggle": {
      iframe: false,
      contents: {
        count: false,
        icon: false,
        title: false
      }
    },
    "modalProduct": {},
    "productSet": {},
},
  init: _ => {
    if (window.ShopifyBuy) {
      if (window.ShopifyBuy.UI) {
        Shop.ShopifyBuyInit();
      } else {
        loadScript();
      }
    } else {
      loadScript();
    }

    function loadScript() {
      var script = document.createElement('script');
      script.async = true;
      script.src = Shop.scriptURL;
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
      script.onload = Shop.ShopifyBuyInit;
    }
  },
  ShopifyBuyInit: _ => {
    Shop.client = ShopifyBuy.buildClient({
      domain: 'w-editions.myshopify.com',
      storefrontAccessToken: '181782c95f4a31b02c678fbe79bfbf36',
      appId: '6',
    });
    const items = document.querySelectorAll('[data-product]')
    items.forEach(el => {
      Shop.createButton(el.dataset.product)
    })
  },
  createButton: id => {
    const node = document.getElementById('product-component-' + id)
    ShopifyBuy.UI.onReady(Shop.client).then(function(ui) {
      ui.createComponent('product', {
        id: [id],
        node: node,
        moneyFormat: '{{amount_with_comma_separator}} €',
        options: Shop.options
      });
    });
  }
}

export default Shop;
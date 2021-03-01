// const promise = (method, url, data=undefined) => {
//     return new Promise(function(resolve, reject) {
//         $.ajax({
//             url: url,
//             type: method,
//             data: data,
//             dataType: "json"
//         })
//         .done(function(data){
//             resolve(data);
//         })
//         .fail(function(err){
//             reject(err);
//         })
//     })
// };

function ajaxPromise(sUrl, sType, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: 'module/shop/controller/controller_shop.php',
            type: 'POST',
            dataType: "json",
            data: {fname: "Ichigo"}
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        }); 
    });
}
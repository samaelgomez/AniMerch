const promise = (method, url, data=undefined) => {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "json"
        })
        .done(function(data){
            resolve(data);
        })
        .fail(function(err){
            reject(err);
        })
    })
};
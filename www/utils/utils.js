function ajaxPromise(sUrl, sType, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            headers: {
                'Authorization':localStorage.getItem('token') != undefined 
                                                            ? localStorage.getItem('token') 
                                                            : ''
            },
            type: sType,
            dataType: "json",
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        });
    });
}

function ajaxPromiseNoJSON(sUrl, sType, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        }); 
    });
}
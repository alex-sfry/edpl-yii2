function comboBox(id, url) {
    const uri = url
    new TomSelect('#' + id, {
        valueField: 'id',
        labelField: 'name',
        searchField: 'name',
        shouldLoad: function (query) {
            if (query.length < 3) return false;
            return true;
        },
        load: function (query, callback) {
            this.clearOptions();
            const url = uri + encodeURIComponent(query);
            fetch(url)
                .then(response => response.json())
                .then(json => {
                    callback(json);
                }).catch(() => {
                    callback();
                });
        },
    });
}

// function createMaterialInputs() {
//     $('#add-material').on('click', function () {
//         const qty = $('.material-cnt').length;
//         console.log(qty)
//         $('.material-cnt').last().clone().appendTo("#materials-controls-cnt");
        

//         const $label = $('.mat-label').last();
//         const $select = $('.mat-control').last();
//         const $input = $('.percentage-control').last();

//         $select.attr('id', $select.attr('id').replace(`-${qty -1}`, `-${qty}`));
//         $label.attr('for', $label.attr('for').replace(`-${qty - 1}`, `-${qty}`));
//         $input.attr('id', $input.attr('id').replace(`-${qty - 1}`, `-${qty}`));
//         $input.val('');
//     })

//     $('#remove-material').on('click', function () {
//         if ($('.material-cnt').length > 1) $('.material-cnt').last().remove();
//     })
// }

if (document.getElementById('station-system_id')) comboBox('station-system_id', '/systems/search?q=');
// if (document.getElementById('planet-system_id')) comboBox('planet-system_id', '/systems/search?q=');
// if (document.getElementById('select-planet_id')) comboBox('select-planet_id', '/planets/search?q=');
if (document.getElementById('planet-material-form')) createMaterialInputs();
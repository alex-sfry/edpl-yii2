// function comboBox(id, url) {
//     const uri = url
//     new TomSelect('#' + id, {
//         valueField: 'id',
//         labelField: 'name',
//         searchField: 'name',
//         shouldLoad: function (query) {
//             if (query.length < 3) return false;
//             return true;
//         },
//         load: function (query, callback) {
//             this.clearOptions();
//             const url = uri + encodeURIComponent(query);
//             fetch(url)
//                 .then(response => response.json())
//                 .then(json => {
//                     callback(json);
//                 }).catch(() => {
//                     callback();
//                 });
//         },
//     });
// }

function datalist(id, url) {
    let debounceTimer;

    $(`#${id}`).on('keyup', function () {
        const query = $(this).val();

        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
            $.ajax({
                url: url,
                method: 'GET',
                data: { q: query },
                success(response) {
                    console.log(response);
                }
            });
        }, 300); // debounce delay (ms)
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

if (document.getElementById('systemName')) datalist('station-system_id', '/systems/search');
// if (document.getElementById('planet-material-form')) createMaterialInputs();
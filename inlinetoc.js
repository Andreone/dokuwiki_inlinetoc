
function hideDokuwikiToc() {
    if(document.getElementById('inlinetoc2')) {
        var elements = document.getElementsByTagName('div');
        for(var i=0; i < elements.length; i++) {
            if(elements[i].id == 'dw__toc') {
                elements[i].style.display = 'none';
                break;
            }
        }
    }
}

jQuery(hideDokuwikiToc);

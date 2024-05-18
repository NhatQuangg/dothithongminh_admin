let thisPage = 1;
let limit = 10;
let list = document.querySelectorAll('.content-table .td-item');

console.log(list)

function loadItem(){
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    // item là từng item bên trong 
    // key là vị trí của item đó
    list.forEach((item, key) => {
        if(key >= beginGet && key <= endGet){
            // trỏ tới class item để thay đổi thuộc tính display: block
            item.style.display = 'revert';
        }
        else{
            item.style.display = 'none';
        }
    })
    listPage();
}
loadItem();

function listPage(){
    // tìm tổng số trang: tổng số item / số item trên 1 trang
    // dùng math.ceil để làm tròn
    let count = Math.ceil(list.length / limit);   
    document.querySelector('.listPage').innerHTML = '';
    
    if(thisPage != 1){
        let start = document.createElement('li');
        start.innerText = '««';
        start.setAttribute('onclick', "changePage(" + 1 + ")");
        document.querySelector('.listPage').appendChild(start);
    }
    
    if(thisPage != 1){
        let prev = document.createElement('li');
        prev.innerText = '«';
        prev.setAttribute('onclick', "changePage(" + (thisPage-1) + ")");
        document.querySelector('.listPage').appendChild(prev);
    }


    for(i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage(" + i + ")");
        document.querySelector('.listPage').appendChild(newPage);
    }
    if(thisPage != count){
        let next = document.createElement('li');
        next.innerText = '»';
        next.setAttribute('onclick', "changePage(" + (thisPage+1) + ")");
        document.querySelector('.listPage').appendChild(next);
    }

    if(thisPage != count){
        let end = document.createElement('li');
        end.innerText = '»»';
        end.setAttribute('onclick', "changePage(" + count + ")");
        document.querySelector('.listPage').appendChild(end);
    }
}

function changePage(i){
    thisPage = i;
    loadItem();
}

// Phân trang cho bảng 1
let thisPage_Statistics_1 = 1;
let limit_Statistics_1 = 5;
let list_Statistics_1 = document.querySelectorAll('.content-table-statistics-1 .td-item');

console.log(list_Statistics_1);

function loadItem1(){
    let beginGet = limit_Statistics_1 * (thisPage_Statistics_1 - 1);
    let endGet = limit_Statistics_1 * thisPage_Statistics_1 - 1;
    list_Statistics_1.forEach((item, key) => {
        if(key >= beginGet && key <= endGet){
            item.style.display = 'revert';
        }
        else{
            item.style.display = 'none';
        }
    })
    listPage1();
}
loadItem1();

function listPage1(){
    let count = Math.ceil(list_Statistics_1.length / limit_Statistics_1);   
    document.querySelector('.listPage-statistics-1').innerHTML = '';
    
    // console.log(thisPage_Statistics_1);

    if(thisPage_Statistics_1 != 1){
        let start = document.createElement('li');
        start.innerText = '««';
        start.setAttribute('onclick', "changePage1(" + 1 + ")");
        document.querySelector('.listPage-statistics-1').appendChild(start);
    }
    
    if(thisPage_Statistics_1 != 1){
        let prev = document.createElement('li');
        prev.innerText = '«';
        prev.setAttribute('onclick', "changePage1(" + (thisPage_Statistics_1-1) + ")");
        document.querySelector('.listPage-statistics-1').appendChild(prev);
    }

    for(i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage_Statistics_1){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage1(" + i + ")");
        document.querySelector('.listPage-statistics-1').appendChild(newPage);
    }
    if(thisPage_Statistics_1 != count){
        let next = document.createElement('li');
        next.innerText = '»';
        next.setAttribute('onclick', "changePage1(" + (thisPage_Statistics_1+1) + ")");
        document.querySelector('.listPage-statistics-1').appendChild(next);
    }

    if(thisPage_Statistics_1 != count){
        let end = document.createElement('li');
        end.innerText = '»»';
        end.setAttribute('onclick', "changePage1(" + count + ")");
        document.querySelector('.listPage-statistics-1').appendChild(end);
    }
}

function changePage1(i){
    thisPage_Statistics_1 = i;
    loadItem1();
}

// Phân trang cho bảng 2
let thisPage_Statistics_2 = 1;
let limit_Statistics_2 = 5;
let list_Statistics_2 = document.querySelectorAll('.content-table-statistics-2 .td-item');

console.log(list_Statistics_2);

function loadItem2(){
    let beginGet = limit_Statistics_2 * (thisPage_Statistics_2 - 1);
    let endGet = limit_Statistics_2 * thisPage_Statistics_2 - 1;
    list_Statistics_2.forEach((item, key) => {
        if(key >= beginGet && key <= endGet){
            item.style.display = 'revert';
        }
        else{
            item.style.display = 'none';
        }
    })
    listPage2();
}
loadItem2();

function listPage2(){
    let count = Math.ceil(list_Statistics_2.length / limit_Statistics_2);   
    document.querySelector('.listPage-statistics-2').innerHTML = '';
    
    console.log(thisPage_Statistics_2);

    if(thisPage_Statistics_2 != 1){
        let start = document.createElement('li');
        start.innerText = '««';
        start.setAttribute('onclick', "changePage2(" + 1 + ")");
        document.querySelector('.listPage-statistics-2').appendChild(start);
    }
    
    if(thisPage_Statistics_2 != 1){
        let prev = document.createElement('li');
        prev.innerText = '«';
        prev.setAttribute('onclick', "changePage2(" + (thisPage_Statistics_2-1) + ")");
        document.querySelector('.listPage-statistics-2').appendChild(prev);
    }

    for(i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage_Statistics_2){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage2(" + i + ")");
        document.querySelector('.listPage-statistics-2').appendChild(newPage);
    }
    if(thisPage_Statistics_2 != count){
        let next = document.createElement('li');
        next.innerText = '»';
        next.setAttribute('onclick', "changePage2(" + (thisPage_Statistics_2+1) + ")");
        document.querySelector('.listPage-statistics-2').appendChild(next);
    }

    if(thisPage_Statistics_2 != count){
        let end = document.createElement('li');
        end.innerText = '»»';
        end.setAttribute('onclick', "changePage2(" + count + ")");
        document.querySelector('.listPage-statistics-2').appendChild(end);
    }
}

function changePage2(i){
    thisPage_Statistics_2 = i;
    loadItem2();
}

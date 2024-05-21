
// let limit = 10;
// let list = document.querySelectorAll('.content-table .td-item');

// console.log(list)

// function loadItem(){
//     let beginGet = limit * (thisPage - 1);
//     let endGet = limit * thisPage - 1;
//     // item là từng item bên trong 
//     // key là vị trí của item đó
//     list.forEach((item, key) => {
//         if(key >= beginGet && key <= endGet){
//             // trỏ tới class item để thay đổi thuộc tính display: block
//             item.style.display = 'revert';
//         }
//         else{
//             item.style.display = 'none';
//         }
//     })
//     listPage();
// }
// loadItem();

// function listPage(){
//     // tìm tổng số trang: tổng số item / số item trên 1 trang
//     // dùng math.ceil để làm tròn
//     let count = Math.ceil(list.length / limit);   
//     document.querySelector('.listPage-reflect-').innerHTML = '';
    
//     if(thisPage != 1){
//         let start = document.createElement('li');
//         start.innerText = '««';
//         start.setAttribute('onclick', "changePage_(" + 1 + ")");
//         document.querySelector('.listPage-reflect-').appendChild(start);
//     }
    
//     if(thisPage != 1){
//         let prev = document.createElement('li');
//         prev.innerText = '«';
//         prev.setAttribute('onclick', "changePage_(" + (thisPage-1) + ")");
//         document.querySelector('.listPage-reflect-').appendChild(prev);
//     }


//     for(i = 1; i <= count; i++) {
//         let newPage = document.createElement('li');
//         newPage.innerText = i;
//         if(i == thisPage){
//             newPage.classList.add('active');
//         }
//         newPage.setAttribute('onclick', "changePage_(" + i + ")");
//         document.querySelector('.listPage-reflect-').appendChild(newPage);
//     }
//     if(thisPage != count){
//         let next = document.createElement('li');
//         next.innerText = '»';
//         next.setAttribute('onclick', "changePage_(" + (thisPage+1) + ")");
//         document.querySelector('.listPage-reflect-').appendChild(next);
//     }

//     if(thisPage != count){
//         let end = document.createElement('li');
//         end.innerText = '»»';
//         end.setAttribute('onclick', "changePage_(" + count + ")");
//         document.querySelector('.listPage-reflect-').appendChild(end);
//     }
// }

// function changePage_(i){
//     thisPage = i;
//     loadItem();
// }


// Phân trang cho bảng 1
let thisPage1 = 1;
let limit1 = 5;
let list1 = document.querySelectorAll('.content-table-reflect-1 .td-item');

console.log(list1);

function loadItem_1(){
    let beginGet = limit1 * (thisPage1 - 1);
    let endGet = limit1 * thisPage1 - 1;
    list1.forEach((item, key) => {
        if(key >= beginGet && key <= endGet){
            item.style.display = 'revert';
        }
        else{
            item.style.display = 'none';
        }
    })
    listPage_1();
}
loadItem_1();

function listPage_1(){
    let count = Math.ceil(list1.length / limit1);   
    document.querySelector('.listPage-reflect-1').innerHTML = '';
    
    // console.log(thisPage1);

    if(thisPage1 != 1){
        let start = document.createElement('li');
        start.innerText = '««';
        start.setAttribute('onclick', "changePage_1(" + 1 + ")");
        document.querySelector('.listPage-reflect-1').appendChild(start);
    }
    
    if(thisPage1 != 1){
        let prev = document.createElement('li');
        prev.innerText = '«';
        prev.setAttribute('onclick', "changePage_1(" + (thisPage1-1) + ")");
        document.querySelector('.listPage-reflect-1').appendChild(prev);
    }

    for(i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage1){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage_1(" + i + ")");
        document.querySelector('.listPage-reflect-1').appendChild(newPage);
    }
    if(thisPage1 != count){
        let next = document.createElement('li');
        next.innerText = '»';
        next.setAttribute('onclick', "changePage_1(" + (thisPage1+1) + ")");
        document.querySelector('.listPage-reflect-1').appendChild(next);
    }

    if(thisPage1 != count){
        let end = document.createElement('li');
        end.innerText = '»»';
        end.setAttribute('onclick', "changePage_1(" + count + ")");
        document.querySelector('.listPage-reflect-1').appendChild(end);
    }
}

function changePage_1(i){
    thisPage1 = i;
    loadItem_1();
}

// Phân trang cho bảng 2
let thisPage2 = 1;
let limit2 = 5;
let list2 = document.querySelectorAll('.content-table-reflect-2 .td-item');

console.log(list2);

function loadItem_2(){
    let beginGet = limit2 * (thisPage2 - 1);
    let endGet = limit2 * thisPage2 - 1;
    list2.forEach((item, key) => {
        if(key >= beginGet && key <= endGet){
            item.style.display = 'revert';
        }
        else{
            item.style.display = 'none';
        }
    })
    listPage_2();
}
loadItem_2();

function listPage_2(){
    let count = Math.ceil(list2.length / limit2);   
    document.querySelector('.listPage-reflect-2').innerHTML = '';
    
    console.log(thisPage2);

    if(thisPage2 != 1){
        let start = document.createElement('li');
        start.innerText = '««';
        start.setAttribute('onclick', "changePage_2(" + 1 + ")");
        document.querySelector('.listPage-reflect-2').appendChild(start);
    }
    
    if(thisPage2 != 1){
        let prev = document.createElement('li');
        prev.innerText = '«';
        prev.setAttribute('onclick', "changePage_2(" + (thisPage2-1) + ")");
        document.querySelector('.listPage-reflect-2').appendChild(prev);
    }

    for(i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage2){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage_2(" + i + ")");
        document.querySelector('.listPage-reflect-2').appendChild(newPage);
    }
    if(thisPage2 != count){
        let next = document.createElement('li');
        next.innerText = '»';
        next.setAttribute('onclick', "changePage_2(" + (thisPage2+1) + ")");
        document.querySelector('.listPage-reflect-2').appendChild(next);
    }

    if(thisPage2 != count){
        let end = document.createElement('li');
        end.innerText = '»»';
        end.setAttribute('onclick', "changePage_2(" + count + ")");
        document.querySelector('.listPage-reflect-2').appendChild(end);
    }
}

function changePage_2(i){
    thisPage2 = i;
    loadItem_2();
}

// Phân trang cho bảng 3
let thisPage3 = 1;
let limit3 = 5;
let list3 = document.querySelectorAll('.content-table-reflect-3 .td-item');

function loadItem_3(){
    let beginGet = limit3 * (thisPage3 - 1);
    let endGet = limit3 * thisPage3 - 1;
    list3.forEach((item, key) => {
        if(key >= beginGet && key <= endGet){
            item.style.display = 'revert';
        }
        else{
            item.style.display = 'none';
        }
    })
    listPage_3();
}
loadItem_3();

function listPage_3(){
    let count = Math.ceil(list3.length / limit3);  
    
    console.log(count);
    document.querySelector('.listPage-reflect-3').innerHTML = '';
    
    console.log(thisPage3);

    if(thisPage3 != 1){
        let start = document.createElement('li');
        start.innerText = '««';
        start.setAttribute('onclick', "changePage_3(" + 1 + ")");
        document.querySelector('.listPage-reflect-3').appendChild(start);
    }
    
    if(thisPage3 != 1){
        let prev = document.createElement('li');
        prev.innerText = '«';
        prev.setAttribute('onclick', "changePage_3(" + (thisPage3-1) + ")");
        document.querySelector('.listPage-reflect-3').appendChild(prev);
    }

    for(i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage3){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage_3(" + i + ")");
        document.querySelector('.listPage-reflect-3').appendChild(newPage);
    }
    if(thisPage3 != count){
        let next = document.createElement('li');
        next.innerText = '»';
        next.setAttribute('onclick', "changePage_3(" + (thisPage3+1) + ")");
        document.querySelector('.listPage-reflect-3').appendChild(next);
    }

    if(thisPage3 != count){
        let end = document.createElement('li');
        end.innerText = '»»';
        end.setAttribute('onclick', "changePage_3(" + count + ")");
        document.querySelector('.listPage-reflect-3').appendChild(end);
    }
}

function changePage_3(i){
    thisPage3 = i;
    loadItem_3();
}

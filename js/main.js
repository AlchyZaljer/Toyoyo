$(document).ready(() => {

    $('.arrowR').click( (event) => {
        let currCardId = event.currentTarget.closest('.card').id;
        let curImg = $(`.card[id=${currCardId}] .albumImg.visibleAlbumImg`);
        let curImgIndex = curImg.index();
        let nextImgIndex = curImgIndex + 1;
        let nextImg = $(`.card[id=${currCardId}] .albumImg`).eq(nextImgIndex);
        curImg.fadeOut(300);
        curImg.toggleClass('visibleAlbumImg');

        if (nextImgIndex == ($(`.card[id=${currCardId}] .albumImg:last`).index() + 1)) {
            $(`.card[id=${currCardId}] .albumImg`).eq(0).fadeIn(300);
            $(`.card[id=${currCardId}] .albumImg`).eq(0).toggleClass('visibleAlbumImg');
        }
        else {
            nextImg.fadeIn(300);
            nextImg.toggleClass('visibleAlbumImg');
        }
    })

    $('.arrowL').on('click', (event) => {
        let currCardId = event.currentTarget.closest('.card').id;
        let curImg = $(`.card[id=${currCardId}] .visibleAlbumImg`);
        let curImgIndex = curImg.index();
        let prevImgIndex = curImgIndex - 1;
        let prevImg = $(`.card[id=${currCardId}] .albumImg`).eq(prevImgIndex);
        curImg.fadeOut(300);
        curImg.toggleClass('visibleAlbumImg');
        prevImg.fadeIn(300);
        prevImg.toggleClass('visibleAlbumImg');
    })
    
});
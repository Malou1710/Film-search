export default class Products {
    constructor() {
        this.data = {
            password: "1710"
        }
        this.rootElem = document.querySelector('.products');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');
        this.ratingSearch = this.filter.querySelector('.ratingSearch');
        this.mpaSearch = this.filter.querySelector('.mpaSearch');
        this.aarSearch = this.filter.querySelector('.aarSearch');
    }

    async init(){
        this.nameSearch.addEventListener('input', () =>{
            if(this.nameSearch.value.length >= 2){
                this.render();
            }
        });

        //rating-slider
        this.ratingSearch.addEventListener('input', () =>{
            this.render();
        });

        this.mpaSearch.addEventListener('input', () =>{
            this.render();
        });

        this.aarSearch.addEventListener('input', () =>{
            this.render();
        });





        await this.render() ;
    }

    async render(){
        const data = await this.getData();

        const row = document.createElement('div');
        row.classList.add('row', 'g-4');

        for(const item of data){
            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');

            col.innerHTML = `
                <div class="card opacity-75 shadow-lg scale text-hvid h-100 rounded-0 p-0 d-flex flex-column justify-content-between mx-2 ">
                    <img src="uploads/${item.filmBillede}" class="card-img-top rounded-0 border-0 ">
                    <div class="card-body">
                        <h5 style="font-family: Poppins, sans-serif; font-weight: bolder;" class="card-title">${item.filmTitel}</h5>
                        <div class="rating justify-content-start d-flex"">
                        <div style="font-size: 15px; margin-right: 5px; color: #FFB800;" class="star">
                            &#9733;
                        </div>
                        <div style="font-size: 15px; font-family: 'Roboto Mono', sans-serif; opacity: 70%;">
                        ${item.filmRating}
                        </div>
                        </div>
                        <p style="font-family: Poppins, sans-serif;" class="card-text">${item.filmResume}</p>
                    </div>
                    <div class="readabout p-1 justify-content-center d-flex" style="font-family: Poppins, sans-serif;">
                        <a href="webmoviepage.php?movieId=${item.filmId}" class=" btn btn-sort w-75 rounded-0 stretched-link " style="text-transform: none; font-family: 'Roboto Mono', sans-serif">Læs om filmen</a>
                    </div>
                </div>
            `;
            row.appendChild(col);
        }

        this.items.innerHTML = '';
        this.items.appendChild(row);

    }



    async getData(){
        this.data.nameSearch = this.nameSearch.value;
        this.data.ratingSearch = this.ratingSearch.value;
        this.data.mpaSearch = this.mpaSearch.value;
        this.data.aarSearch = this.aarSearch.value;
        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();

    }}

<!doctype html>
<html lang="pt-br" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU5_4EEiM4mlZw9zYcbM39TeTATyMSF0Q&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <style>
        :root {
            --padding-card: 1rem;
        }
    </style>
    <title>Aquarela Imports - Vitrine Virtual</title>
</head>

<body class="bg-white">
    <div>
        <div id="navbar" class="h-28 bg-black grid-cols-1 flex justify-center items-center">
            <form id="src_form" class="form-control">
                <div class="input-group ">
                    <input id="src_input" type="text" placeholder="Pesquise seu produto aqui" class="input input-bordered" />
                    <button class="btn btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <nav id="categorias" class="min-w-full bg-orange-500 flex justify-center items-center gap-px">
    </nav>

    <div id="homeDiv">
        <div class="carousel w-full">
            <div id="slide1" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-1-mobilete-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide4" class="btn btn-circle">❮</a>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-2-kitferramentas-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2 max-h-40">
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-1-mobilete-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide4" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <img src="/app/views/images/painel-1-mobilete-teste.png" class="w-full" />
                <div class="absolute flex justify-between -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                </div>
            </div>
        </div>

        <div id="advertisements_container"></div>

        <gmp-map class="w-full h-96" center="-23.541576385498047,-46.632240295410156" zoom="14" map-id="DEMO_MAP_ID">
            <gmp-advanced-marker position="-23.541576385498047,-46.632240295410156" title="My location">
            </gmp-advanced-marker>
        </gmp-map>
    </div>

    <div id="advertisement_by_categories"></div>

    <footer class="footer p-10 bg-neutral text-neutral-content">
        <div>
            <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current">
                <path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                </path>
            </svg>
            <p>Aquarela Imports<br />Promovendo produtos de qualidade</p>
        </div>
        <div>
            <span class="footer-title">Social</span>
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg></a>
            </div>
        </div>
    </footer>
    </div>

    <div>
        <dialog id="produto" class="rounded-lg bg-white"></dialog>
    </div>



    <!--  <dialog id="modalsemcompra" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box bg-slate-100">
            <h3 class="font-bold text-lg text-black">Olá Cliente! Desculpe-nos pelo inconveniente mas nosso site ainda
                está em desenvolvimento.</h3>
            <p class="py-4 text-black">No momento ainda não temos opção de compra no nosso site, mas você pode nos
                contatar pelo whatsapp! Basta clicar no link: </p><a
                href="https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+nos+produtos+da+Aquarela+Imports%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F">
                <p class="underline text-blue-600">https://wa.me/5511978654859</p>
            </a>. <br> <img src="/app/views/images/qrcode.png" alt=""> <br>
            <p class="text-black">Lembrando que todos os nossos preços são ficticios no momento pois o site ainda está
                em desenvolvimento...</p>
            <div class="modal-action">
               
                <button
                    class="btn border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300 text-white">Close</button>
            </div>
        </form>
    </dialog> -->

    <dialog id="modalpoucoanuncio" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box bg-slate-100">
            <h3 class="font-bold text-lg text-black">Olá Cliente! Desculpe-nos pelo inconveniente mas nosso site ainda
                está em desenvolvimento.</h3>
            <p class="py-4 text-black">No momento ainda não temos todos os nossos anuncios no site, mas você pode nos
                contatar pelo whatsapp para ver mais produtos! Basta clicar no link: </p> <a href="https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+nos+produtos+da+Aquarela+Imports%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F">
                <p class="underline text-blue-600">https://wa.me/5511978654859</p>
            </a>. <br> <img src="/app/views/images/qrcode.png" alt=""><br>
            <p class="text-black">Lembrando que todos os nossos preços são ficticios no momento pois o site ainda está
                em desenvolvimento.</p>
            <div class="modal-action">

                <button class="btn border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300 text-white">Close</button>
            </div>
        </form>
    </dialog>

    <!--botão carrinho-->

        <button onclick="carrinho.showModal()">
        <img class="mask mask-circle w-48" src="/app/views/images/carrinho2.png" />
        </button>
   
        <dialog id="carrinho" class="modal">
            <div class="modal-box">
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row 1 -->
                        <tr class="cart_product">
                            <td>Hoverboard</td>

                            <td>
                                <span class="price_product">R$900,00 </span>
                            </td>

                            <td>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number" min="1" value="1" class="input input-bordered w-full max-w-xs qty_product" />
                                    <button class="btn btn-error remove-button">
                                        Remover
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 2 -->
                        <tr class="cart_product">
                            
                            <td>Luva</td>
                            <td>
                                <span class="price_product">R$50,00</span>
                            </td>
                            <td>
                                <div class="grid grid-cols-2 gap-2">
                                        <input type="number" min="1" value="2" class="input input-bordered w-full max-w-xs qty_product" />
                                        <button class="btn btn-error remove-button">Remover</button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 3 -->
                        <tr class="cart_product">
                            
                            <td>Farol Bike</td>
                            <td>
                                <span class="price_product">R$120,00</span>
                            </td>
                            <td>
                                <div class="grid grid-cols-2 gap-2">
                                        <input type="number" min="1" value="3" class="input input-bordered w-full max-w-xs qty_product" />
                                        <button class="btn btn-error remove-button">Remover</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tr></tr>
                    </table>

                    <div class="flex justify-end m-2 total">
                        <strong class="mr-2">Total: </strong>
                        <span></span>
                    </div>
                    
                    </div>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Finalizar Compra</button>
                        </form>
                    </div>
                </div>
            </div>
        </dialog>

<!-- <a href="https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+no+produto+${ad.name}+%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F"> </a>-->

    <script>

        
            const remove_btn = document.getElementsByClassName("remove-button")
            
            for (var i = 0; i < remove_btn.length; i++) {
            remove_btn[i].addEventListener("click", removeProduct)
            }

            const qty_prod = document.getElementsByClassName("qty_product")
            for (var i = 0; i < qty_prod.length; i++) {
                qty_prod[i],addEventListener("change", updateTotal)
            }

            const addCart_btn = document.getElementsByClassName("add-cart")
            console.log(addCart_btn)

            
            for (var i = 0; i < addCart_btn.length; i++) {
                addCart_btn[i].addEventListener("click", addProductToCart)
            }

            function addProductToCart (event) {
                button = event.target
                const parent = button.parentElement.parentElement.parentElement
                console.log("teste")
                
            }

            function removeProduct (event) {
                    const parent = event.target.parentElement.parentElement.parentElement
                    parent.remove()
                    updateTotal()
            }


            function updateTotal() {
                let totalAmount = 0
                const cart_product = document.getElementsByClassName("cart_product")
            
                    for (var i = 0; i < cart_product.length; i++) {
                        
                            
                            const prod_price = cart_product[i].getElementsByClassName("price_product")[0].innerText.replace("R$", "").replace(",", ".")
                            const qty_prod   = cart_product[i].getElementsByClassName("qty_product")[0].value
                            console.log(prod_price)

                totalAmount += prod_price * qty_prod
            }
                totalAmount = totalAmount.toFixed(2).replace(".", ",")
                document.querySelector(".total span").innerText = " R$" + totalAmount
            }


        let advertisements = []

        let localCategories = []

        function buildCategory(category, ad) {
            const element = document.createElement("div")
            element.innerHTML = `
                <div class="flex justify-between max-w-5xl mx-auto pt-5 pb-6 px-4">
                    <h2 class="text-2xl text-black py-5 pr-3">${category.description}</h2>
                    ${category.verMais ? '<a href="#none" class="py-5 text-xl underline" onclick="showMore(\''+ category.id + '\')">Ver mais</a>' : '<a href="#none" class="py-5 text-xl underline" ></a>'}
                </div>
                <div class="flex justify-center items-center pb-5 px-4">
                    <div id="category_items_${category.id}" class="grid md:grid-cols-4 gap-2 max-w-5xl pb-8 sm:pr-3">${ad.map(ad => buildAd(ad)).join("")}</div>
                </div>
            `
            return element
        }

        function buildAdvertisement(ad) {
            return `<div class="max-w-5xl w-full">
                <div class="lg:flex bg-base-100 shadow-xl">
                    <div class="modal-action ml-auto">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                    </div>
                    <div class="m-10 flex flex-row justify-center">
                        <div class="carousel items-left w-full">
                            ${ad.base64_data ? Object.keys(ad.base64_data).map((id, index) => {
                                const image = ad.base64_data[id]

                                return `<div id="slide_ad_${index}" class="carousel-item relative w-full">
                                <img src="${image}" class="w-full object-scale-down" />
                                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                    <a href="#slide_ad_${index - 1}" class="btn btn-circle">❮</a>
                                    <a href="#slide_ad_${index + 1}" class="btn btn-circle">❯</a>
                                </div>
                            </div>`
                                }).join('') : ""}
                        </div>
                    </div>

                    <div class="m-12">
                        <div class="card w-96 bg-base-100">
                            <div class="w-full p-5">
                                <h3 class="font-bold text-2xl">${ad.name}</h3>
                                <p class="text-lg">${ad.description}</p>
                                <p class="mt-3 text-lg text-black font-medium">R$${ad.price}</p>
                            </div>
                            <div class="card-body items-center text-center h-96 m-12">
                                <button id="buy_btn_${ad.id}" class="btn btn-neutral btn-wide bg-orange-500 border-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:ring-orange-300 text-white" onclick="orderAdd('${ad.id}','${ad.name}')" <a href="https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+no+produto+${ad.name}+%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F">Comprar</a></button>
                                <button class="btn btn-neutral btn-wide bg-orange-500 border-orange-500 hover:bg-orange-600 active:bg-orange-700 ocus:ring-orange-300 text-white mt-2 add-cart">Adicionar ao carrinho</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        }

        function buildAd(ad) {
            return `<div id="ad_item_${ad.id}" class="card bg-base-100 bg-slate-50 text-primary-content">
                <figure><img class="w-full h-52 object-cover" src="${ad.base64_data ? ad.base64_data[0] : "?"}" alt="Shoes" /></figure>
                <div class="card-body">
                    <h2 class="card-title text-black">${ad.name}</h2>
                    <p class="md:text-sm text-black">${ad.description}</p>
                    <div class="card-actions justify-end">
                        <p class="mt-3 text-lg text-black font-medium">R$ ${ad.price}</p>
                        <button id="ad_button_${ad.id}" class="btn btn-primary border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300" onclick="showAd(${ad.id})">Comprar</button>
                    </div>
                </div>
            </div>`
        }

        function filterResults(categoryId) {
            return advertisements.filter(advertisement => advertisement.category_id == categoryId)
        }

        function addCategoryToNavbar(category) {
            const categoryItem = document.createElement('a')

            categoryItem.className = "hover:bg-black/10 font-medium text-lg px-4 py-3 text-white"
            categoryItem.innerText = category.description
            categoryItem.addEventListener('click', () => {
                const ads = filterResults(category.id)

                if (ads.length > 0) {
                    homeDiv.classList.add('hidden')

                    advertisement_by_categories.innerHTML = ""
                    advertisement_by_categories.appendChild((buildCategory(category, ads)))
                } else {
                    modalpoucoanuncio.showModal()
                }
            })

            categorias.appendChild(categoryItem)
        }

        function search() {
            src_form.addEventListener('submit', (e) => {
                e.preventDefault()

                homeDiv.classList.add('hidden')

                const input = src_input.value
                const category = {
                    id: 0,
                    description: "Resultados da pesquisa",
                    verMais: false
                }

                fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/search', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            search: input
                        })
                    })
                    .then(response => response.json())
                    .then((ads) => {
                        advertisement_by_categories.innerHTML = ""
                        advertisement_by_categories.appendChild((buildCategory(category, ads)))
                    })
            })
        }

        function showMore(categoryId) {
            const category = localCategories.find((category) => category.id == categoryId)
            const ads = filterResults(category.id)

            console.log({
                category,
                ads
            })

            homeDiv.classList.add('hidden')

            advertisement_by_categories.innerHTML = ""
            advertisement_by_categories.appendChild(buildCategory(category, ads))
        }

        function showAd(advertisementId) {
            const advertisement = advertisements.find(ad => ad.id == advertisementId)

            if (advertisement) {
                produto.innerHTML = buildAdvertisement(advertisement)
                produto.showModal()
            }
        }

        function orderAdd(advertisementId, advertisementName) {
            event.preventDefault()

            fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/order/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        advertisement_id: advertisementId,
                        advertisement_name: advertisementName
                    })
                })
                .then(response => response.json())
                .then(uri => {
                    window.location.href = `https://wa.me/5511978654859?text=Ol%C3%A1%2C+estou+interessado+no+produto+${advertisementName}+%2C+podem+me+dar+mais+informa%C3%A7%C3%B5es%3F`
                })
        }

        async function init() {
            const categories = await fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/category/listall')
                .then(response => response.json())

            localCategories = categories

            const advertisement = await fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/listall')
                .then(response => response.json())
                .then(ads => advertisements = ads)

            categories.map(category => {
                addCategoryToNavbar(category)
                const ads = filterResults(category.id).slice(0, 4)

                if (ads.length > 0) {
                    advertisements_container.appendChild(buildCategory({
                        id: category.id,
                        description: category.description,
                        verMais: true
                    }, ads))
                }
            })

            search()
        }

        init()
    </script>

    <!-- <script src="/public/assets/js/script.js"></script> -->
</body>

</html>
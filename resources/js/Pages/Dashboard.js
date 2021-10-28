import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { useDispatch } from 'react-redux';
import { postAddress, postCompany, postProduct, postTotal, downloadPdf } from '@/Components/Reducer/RootReducer';
import '../../css/app.css';

export default function Dashboard(props) {

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div className="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg className="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>Open and fill form below to generate quotation</p>
                    </div>
                        <div className="p-6 bg-white border-b border-gray-200">
                                <div className="px-2">
                                        <div className="flex -mx-2">
                                            <div className="w-1/3 px-2">
                                                <div>
                                                    <CompanyDetails props={props}/>
                                                </div>
                                            </div>
                                            <div className="w-1/3 px-2">
                                                <div>
                                                    <QuotationAddress props={props}/>
                                                </div>
                                            </div>
                                            <div className="w-1/3 px-2">
                                                <div>
                                                    <PostProductDetails props={props}/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
             </div>




              {/* <Modal/> */}

          </Authenticated>
    );
}



function CompanyDetails({props}){
    const dispatch = useDispatch();

    const [toggle,setToggle] = useState(true);

    const [company, setCompany] = useState({
        company_id:props.auth.user.id,
        company_logo_url:"",
        company_slogan:"",
        company_address:"",
        company_web_url:"",
        company_email:""
    });


    const getInput = e => setCompany({...company, [e.target.name]:e.target.value})

    const param = new URLSearchParams(company).toString();

    const sendData = () => dispatch(postCompany(param));

    const toggleBtn = () => {

    }

    const toggleBody = () => {
        const toggleBody = document.getElementsByClassName('toggle-body')[0];
        const toggleBodyOn = document.getElementsByClassName('toggle-body-on')[0];
        const toggleSpan = document.getElementsByClassName('font-open-close')[0];

        if(toggle) {
            toggleBody.className = 'toggle-body-on';
            toggleSpan.textContent = '+';
             setToggle(false)
        } else {
            toggleBodyOn.className = 'toggle-body'
            toggleSpan.textContent = '-';
            setToggle(true)
        }

    }
    return (
        <div>
            <div onClick={toggleBody} className="toggle-parent bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong className="font-bold">Add Company Information</strong>
                <span className="font-open-close">-</span>
            </div>
            <br/>
             <div className="toggle-body">
             <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div className="w-full max-w-lg">
                <div className="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
                    <p className="font-bold">Company Details</p>
                    <p className="text-sm">This information will be at the top of your invoice, Make sure you give out correct information</p>
             </div>
            <div className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div className="mb-4">
                    <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="company_logo">Company Logo</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="company_logo" type="text" name="company_logo_url" onChange={(e) => getInput(e)} placeholder="Company Logo URL"/>
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="company_slogan">Company Slogan</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="company_slogan" type="text" name="company_slogan" onChange={(e) => getInput(e)} placeholder="Company Slogan"/>
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="company_address">Company Address</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="company_address" type="text" name="company_address" onChange={(e) => getInput(e)} placeholder="Company Address"/>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="company_web_url">Company Website</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="company_web_url" type="text" name="company_web_url" onChange={(e) => getInput(e)} placeholder="Company Website"/>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="company_email">Company Email</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="company_email" type="text" name="company_email" onChange={(e) => getInput(e)} placeholder="Company Email"/><br/>
                </div>

                   <div className="flex items-center justify-between">
                        <input className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onClick={sendData}/>
                        <button type="button" className="button" onClick={toggleBtn}>
                            <span className="button__text">Save</span>
                        </button>
                   </div>
                </div>

            </div>
        </div>
        </div>
        </div>
        </div>

    )
}

function QuotationAddress({props}){
    const dispatch = useDispatch();
    const [toggle,setToggle] = useState(true);

    let randNumber = '' + Math.random();
    const quotationNo = randNumber.substr(randNumber.length - 5);

    const [address, setAddress] = useState({
        quotation_id:props.auth.user.id,
        quotation_to:"",
        quotation_date:"",
        quotation_number:quotationNo
    })

    const getInput = e => setAddress({...address, [e.target.name]: e.target.value});


    const param = new URLSearchParams(address).toString();

    const sendData = () => dispatch(postAddress(param));

    const toggleBody = () => {
        const toggleBody = document.getElementsByClassName('toggle-body-2')[0];
        const toggleBodyOn = document.getElementsByClassName('toggle-body-on-1')[0];
        const toggleSpan = document.getElementsByClassName('font-open-close-2')[0];

        if(toggle) {
            toggleBody.className = 'toggle-body-on-1';
            toggleSpan.textContent = '+';
             setToggle(false)
        } else {
            toggleBodyOn.className = 'toggle-body-2'
            toggleSpan.textContent = '-';
            setToggle(true)
        }

    }
    return (
        <div>
             <div onClick={toggleBody} className="toggle-parent bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong className="font-bold">Enter Receipient Details</strong>
                    <span className="font-open-close-2">-</span>
            </div>
            <br/>
            <div className="toggle-body-2">
            <div className="w-full max-w-xs">
                <div className="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
                    <p className="font-bold">Receipient Information</p>
                    <p className="text-sm">Information to where the quoatation is addressed to</p>
                </div>
                <div className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div className="mb-4">
                    <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="quotation_receipient">Quotation Receipient</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="quotation_receipient" onChange={(e) => getInput(e)} name="quotation_to" type="text"/>
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="quotation_date">Date</label>
                    <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="quotation_date" name="quotation_date" onChange={(e) => getInput(e)} type="date"/>
                </div>
                    <input className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onClick={sendData}/>

                </div>
            </div>
        </div>
        </div>

    )
}

function PostProductDetails({props}){

    const dispatch = useDispatch()
    const [toggle,setToggle] = useState(true);

    const [product, setProduct] = useState({
        product_id:props.auth.user.id,
        product_quantity:"",
        product_description: "",
        product_unit_price:""
    });

    const getInput = e => setProduct({...product, [e.target.name]:e.target.value});

    const param = new URLSearchParams(product).toString();

    const sendData = () => dispatch(postProduct(param));

    const toggleBody = () => {
        const toggleBody = document.getElementsByClassName('toggle-body-3')[0];
        const toggleBodyOn = document.getElementsByClassName('toggle-body-on-2')[0];
        const toggleSpan = document.getElementsByClassName('font-open-close-3')[0];

        if(toggle) {
            toggleBody.className = 'toggle-body-on-2';
            toggleSpan.textContent = '+';
             setToggle(false)
        } else {
            toggleBodyOn.className = 'toggle-body-3'
            toggleSpan.textContent = '-';
            setToggle(true)
        }

    }

    return (
        <div>
            <div onClick={toggleBody} className="toggle-parent bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong className="font-bold">Enter Receipient Details</strong>
                    <span className="font-open-close-3">-</span>
            </div>
            <br/>
            <div className="toggle-body-3">
                <div className="w-full max-w-xs">
                    <div className="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
                        <p className="font-bold">Product Details</p>
                        <p className="text-sm">Add Quantity of your item, Description of your quotation and Unit price, We will do the hard work and calculate for you the total</p>
                    </div>
                    <div className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="product_quantity">Quantity</label>
                        <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="product_quantity" name="product_quantity" type="number" onChange={(e) => getInput(e)}/>
                        <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="product_description">Description</label>
                        <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"  id="product_description" name="product_description" type="text" onChange={(e) => getInput(e)}/>
                        <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="product_unit_price">Unit Price</label>
                        <input className="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="product_unit_price" name="product_unit_price" type="number" onChange={(e) => getInput(e)}/>
                        <input className="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Add" onClick={sendData}/>
                        <PostTotal props={props}/>

                  </div>


                </div>
            </div>
        </div>

    )
}

function PostTotal({props}) {
    const dispatch = useDispatch();

    const sendData = () => dispatch(postTotal(props.auth.user.id));

    // const generatePdf = () => dispatch(downloadPdf());
    console.log()
    return (
        <div className="w-full max-w-xs">
            <label htmlFor="post_total"></label>
            <input className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" value="Generate PDF" id="post_tota" onClick={sendData}/>
            <a href={`/api/download?product_id=${props.auth.user.id}`} target="_blank">
                <button  className="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg className="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                    <span>Download</span>
                </button>
            </a>

        </div>
    )
}

// function Modal(){
//     return (
//          <div class="w-full max-w-lg">
//               <PostTotal/>
//                     <button className="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
//                             <svg className="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
//                             <span>Download</span>
//                     </button>
//                 <div class="flex flex-wrap -mx-3 mb-6">
//                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
//                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
//                         First Name
//                     </label>
//                     <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane"/>
//                     <p class="text-red-500 text-xs italic">Please fill out this field.</p>
//                     </div>
//                     <div class="w-full md:w-1/2 px-3">
//                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
//                         Last Name
//                     </label>
//                     <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe"/>
//                     </div>
//                 </div>
//                 <div class="flex flex-wrap -mx-3 mb-6">
//                     <div class="w-full px-3">
//                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
//                         Password
//                     </label>
//                     <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************"/>
//                     <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
//                     </div>
//                 </div>
//                 <div class="flex flex-wrap -mx-3 mb-2">
//                     <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
//                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
//                         City
//                     </label>
//                     <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque"/>
//                     </div>
//                     <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
//                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
//                         State
//                     </label>
//                     <div className="relative">
//                         <select className="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
//                         <option>New Mexico</option>
//                         <option>Missouri</option>
//                         <option>Texas</option>
//                         </select>
//                         <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
//                         <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
//                         </div>
//                     </div>
//                     </div>
//                     <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
//                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
//                         Zip
//                     </label>
//                     <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210"/>
//                     </div>
//                 </div>
//         </div>
//     )
// }

import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { useDispatch } from 'react-redux';
import { postAddress, postCompany, postProduct, postTotal } from '@/Components/Reducer/RootReducer';

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
                        <div className="p-6 bg-white border-b border-gray-200">You're logged in!</div>
                    </div>
                </div>
            </div>

              <CompanyDetails props={props}/> <br/>
              <QuotationAddress props={props}/> <br/>
              <PostProductDetails props={props}/> <br/>
              <PostTotal/>
          </Authenticated>
    );
}



function CompanyDetails({props}){
    const dispatch = useDispatch();
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
    return (
        <div>
                    <label htmlFor="company_logo">Company Logo</label>
                    <input id="company_logo" type="text" name="company_logo_url" onChange={(e) => getInput(e)} placeholder="Company Logo URL"/>
                    <label htmlFor="company_slogan">Company Slogan</label>
                    <input id="company_slogan" type="text" name="company_slogan" onChange={(e) => getInput(e)} placeholder="Company Slogan"/>
                    <label htmlFor="company_address">Company Address</label>
                    <input id="company_address" type="text" name="company_address" onChange={(e) => getInput(e)} placeholder="Company Address"/>
                    <label htmlFor="company_web_url">Company Website</label>
                    <input id="company_web_url" type="text" name="company_web_url" onChange={(e) => getInput(e)} placeholder="Company Website"/>
                    <label htmlFor="company_email">Company Email</label>
                    <input id="company_email" type="text" name="company_email" onChange={(e) => getInput(e)} placeholder="Company Email"/><br/>
                    <input type="submit" onClick={sendData}/>
        </div>
    )
}

function QuotationAddress({props}){
    const dispatch = useDispatch();

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

    return (
        <div>
            <label htmlFor="quotation_receipient">Quotation Receipient</label>
            <input id="quotation_receipient" onChange={(e) => getInput(e)} name="quotation_to" type="text"/>       
            <label htmlFor="quotation_date"></label>
            <input id="quotation_date" name="quotation_date" onChange={(e) => getInput(e)} type="date"/> 
            <input type="submit" onClick={sendData}/>
        </div>
    )
}

function PostProductDetails({props}){

    const dispatch = useDispatch()

    const [product, setProduct] = useState({
        product_id:props.auth.user.id,
        product_quantity:"",
        product_description: "",
        product_unit_price:""
    });

    const getInput = e => setProduct({...product, [e.target.name]:e.target.value});

    const param = new URLSearchParams(product).toString();

    const sendData = () => dispatch(postProduct(param));

    return (
        <div>
            <label htmlFor="product_quantity">Quantity</label>
            <input id="product_quantity" name="product_quantity" type="number" onChange={(e) => getInput(e)}/>
            <label htmlFor="product_description">Description</label>
            <input id="product_description" name="product_description" type="text" onChange={(e) => getInput(e)}/>
            <label htmlFor="product_unit_price">Unit Price</label>
            <input id="product_unit_price" name="product_unit_price" type="number" onChange={(e) => getInput(e)}/>
            <input type="submit" onClick={sendData}/>
        </div>
    )
}

function PostTotal() {
    const dispatch = useDispatch();

    const sendData = () => dispatch(postTotal());

    return (
        <div>
            <label htmlFor="post_total"></label>
            <input id="post_total" type="submit" onClick={sendData}/>
        </div>
    )
}
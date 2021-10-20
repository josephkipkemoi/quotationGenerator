import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { useDispatch } from 'react-redux';
import { postCompany } from '@/Components/Reducer/RootReducer';

export default function Dashboard(props) {
    const dispatch = useDispatch();

    // dispatch(postCompany({m:"l"}))
    const company = {
        company_id:"1",
        company_logo_url:"href href",
        company_slogan:"Pamoja Twaweza",
        company_address:"P.O.Box 123",
        company_web_url:"www.lolo.com",
        company_email:"jkemb@gmail.com"
    }
    // console.log(new URLSearchParams({a:'b',c:'d',e:'f'}).toString())

    const sendData = (e) => {
        // 
        const param = new URLSearchParams(company);
        dispatch(postCompany(param.toString()))
        
        // e.preventDefault()
   }  
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
                      <input type="number" name="company_id" defaultValue={props.auth.user.id}/>
                    <label htmlFor="company_logo">Company Logo</label>
                    <input id="company_logo" type="text" name="company_logo_url" placeholder="Company Logo URL"/>
                    <label htmlFor="company_slogan">Company Slogan</label>
                    <input id="company_slogan" type="text" name="company_slogan" placeholder="Company Slogan"/>
                    <label htmlFor="company_address">Company Address</label>
                    <input id="company_address" type="text" name="company_address" placeholder="Company Address"/>
                    <label htmlFor="company_web_url">Company Website</label>
                    <input id="company_web_url" type="text" name="company_web_url" placeholder="Company Website"/>
                    <label htmlFor="company_email">Company Email</label>
                    <input id="company_email" type="text" name="company_email" placeholder="Company Email"/><br/>
                    <input type="submit" onClick={sendData}/>
          </Authenticated>
    );
}

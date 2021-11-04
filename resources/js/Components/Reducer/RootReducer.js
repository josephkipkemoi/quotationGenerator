import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

export const postCompanyName = createAsyncThunk(
    'quotation/postCompanyName',
    async (url, thunkApi) => {
        const response = await axios.post(`/api/company_name?${url}`);

        return response.data
    }
)

export const getCompanyName = createAsyncThunk(
    'quotation/getCompanyName',
    async (url, thunkApi) => {
        const response = await axios.get('/api/company_name');

        return response.data
    }
)

export const postCompany = createAsyncThunk(
    'quotation/postCompany',
    async (url,thunkApi) => {
        const res = await axios.post(`/api/company?${url}`);

        return res.data
    }
)

export const postAddress = createAsyncThunk(
    'quotation/postAddress',
    async (url, thunkApi) => {
        const res = await axios.post(`/api/quotation_address?${url}`);

        return res.data
    }
)

export const postProduct = createAsyncThunk(
    'quotation/postProduct',
    async (url, thunkApi) => {
        const res = await axios.post(`/api/product?${url}`);

        return res.data
    }
)

export const postTotal = createAsyncThunk(
    'quotation/postTotal',
    async (id,thunkApi) => {
        const res = await axios.post(`/api/quotation_total?product_id=${id}`);
        console.log(id)
        return res.data
    }
)

export const downloadPdf = createAsyncThunk(
    'quotation/downloadPdf',
    async (id,thunkApi) => {
        const res = await axios.get(`/api/download?product_id=${id}`);

        return res.data
    }
)

export const companySlice = createSlice({
    name:'quotation',
    initialState:{
        company:[],
        address:[],
        product:[],
        quotation_total:[]
    }
    ,
    extraReducers: (builder) => {
        builder.addCase(postCompany.fulfilled, (state,data) => {
            state.company.push(data)
        }),
        builder.addCase(postAddress.fulfilled, (state, data) => {
            state.address.push(data)
        }),
        builder.addCase(postProduct.fulfilled, (state, data) => {
            state.product.push(data)
        }),
        builder.addCase(postTotal.fulfilled, (state, data) => {
            state.quotation_total.push(data)
        })
    }
})

export default companySlice.reducer;

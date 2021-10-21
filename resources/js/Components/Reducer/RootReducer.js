import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

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
        const res = await axios.post(`/api/quotation?${url}`);
        
         return res.data
    }
)

export const companySlice = createSlice({
    name:'quoatation',
    initialState:{
        company:[],
        address:[]
    }
    ,
    extraReducers: (builder) => {
        builder.addCase(postCompany.fulfilled, (state,data) => {
            state.company.push(data)
        }),
        builder.addCase(postAddress.fulfilled, (state, data) => {
            state.address.push(data)
        })
    }
})

export default companySlice.reducer;    
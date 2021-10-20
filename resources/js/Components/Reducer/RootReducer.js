import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";
export const postCompany = createAsyncThunk(
    'quotation/postCompany',
    async (url,thunkApi) => {
        const param = url;
        const res = await axios.post(`/api/company?${'param'}`);
        // console.log(url)
        console.log(res)
        // return res.data
    }
)

export const companySlice = createSlice({
    name:'quoatation',
    initialState:{
        quotation:[]
    }
    ,
    extraReducers: (builder) => {
        builder.addCase(postCompany.fulfilled, (state,data) => {
            state.quotation.push(data)
        })
    }
})

export default companySlice.reducer;
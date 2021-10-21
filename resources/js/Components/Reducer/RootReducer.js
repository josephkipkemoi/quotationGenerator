import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";
export const postCompany = createAsyncThunk(
    'quotation/postCompany',
    async (url,thunkApi) => {
        const res = await axios.post(`/api/company?${url}`);

        return res.data
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
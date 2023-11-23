import { useState } from 'react'
import './App.css'
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Media from './list/Media'
import ModalDelete from './list/ModalDelete';
import { Topsfilter } from './list/topsbar';
// import Index from './leran/index'
function App() {
  

  return (
    <BrowserRouter>
    <Routes >
      {/* <Route index element={<Media/>} /> */}
      <Route index element={<Media/>}/>
      < Route path='delete' element={<Topsfilter/>}/>
    </Routes>
    </BrowserRouter>
  )
}

export default App

import React from 'react'
import logo from '../assets/logo.png'
import { BsSearch } from "react-icons/bs";
const Navbar = () => {
  return (
    <nav
  className="relative flex w-full flex-wrap items-center justify-between bg-slate-800 py-2 shadow-dark-mild  lg:py-4 lg:px-2">
  <div className="flex w-full flex-wrap items-center justify-between px-3">
    <img src={logo} className='h-8 mr-2' />
    <div className="ms-5 flex w-[30%] items-center justify-between">
      <input
        type="search"
        className="relative m-0 block w-[1px] min-w-0 flex-auto rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-surface transition duration-300 ease-in-out focus:border-primary focus:text-white focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:bg-body-dark dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill"
        placeholder="Search"
        aria-label="Search"
        aria-describedby="button-addon2" />

      <span
        className="flex items-center whitespace-nowrap rounded px-3 py-2.5 text-center text-base font-normal text-gray-600 hover:text-slate-800 hover:bg-slate-600 [&>svg]:w-5"
        id="basic-addon2">
        <BsSearch/>
      </span>
    </div>
  </div>
</nav>
  )
}

export default Navbar
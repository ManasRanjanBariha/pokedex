import React from 'react'
import pokemonash from '../assets/pokemon-ash.png'
const Hero = () => {
  return (
    <div className=' h-5/6 bg-slate-800 text-white flex items-center justify-center flex-row px-5' id='home'>
        <div className='flex-1'>
            <div className='flex  justify-center mx-10 flex-col text-start '>
                <h2 className='text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-500 to-white  mb-2'>Gotta Catch 'Em' All</h2>
                <p>In the vibrant world of Pokémon, trainers embark on thrilling adventures to catch, train, and battle with diverse creatures possessing unique powers and personalities. With each encounter, bonds are forged and legendary journeys unfold in pursuit of becoming the ultimate Pokémon Master.</p>
                <div>                
                  <button className='text-start inline-block my-5 px-4 py-2 bg-yellow-400 text-black rounded-lg  font-bold hover:bg-yellow-800 hover:text-white transition-all duration-300 ' >Read More</button>
                </div>
                </div> 
        </div>
        <div className='flex-1 hidden lg:block'><img src={pokemonash} alt="POkemon background" /></div>
    </div>
  )
}

export default Hero
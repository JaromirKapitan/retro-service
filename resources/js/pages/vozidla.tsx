import Hero from '@/components/misc/Hero'
import Header from '@/components/nav/Header'
import React from 'react'

const VozidlaPage = () => {
  return (
    <>
      <Header />
      <Hero size='lg'>
        <h1 className='text-4xl font-semibold text-center'>Vozidla</h1>
      </Hero>
    </>
  )
}

export default VozidlaPage
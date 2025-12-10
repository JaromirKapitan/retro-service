import About from '@/components/home/About'
import Footer from '@/components/home/Footer'
import Stats from '@/components/home/Stats'
import CookiePopup from '@/components/misc/CookiePopup'
import Hero from '@/components/misc/Hero'
import Header from '@/components/nav/Header'
import React from 'react'
import { reactLang } from '@erag/lang-sync-inertia'

const HomePage = () => {
  const { trans, __ } = reactLang()

  return (
    <>
      <CookiePopup />
    
      <Header />
      <Hero size='lg'>
        <h1 className='text-6xl font-semibold text-center'>{__('web.welcome')}</h1>
      </Hero>
      <Stats />
      <About />
      <Footer />
    </>
  )
}

export default HomePage

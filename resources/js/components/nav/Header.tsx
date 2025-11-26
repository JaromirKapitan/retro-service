import React from 'react'
import { Button } from '../ui/button'
import { ThemeSwitch } from '../ui/theme-switch'
// import { useTranslations } from 'next-intl'
// import LanguageSwitch from '../ui/language-switch'

const Header = () => {
  // TODO: Implement translations for header
  // const t = useTranslations('Header')

  return (
    <>
      <header className='flex items-center justify-between p-2'>
        <a href={'/'} className='px-2 text-2xl font-semibold'>Retro Servis</a>
        <div className='flex gap-2'>
          <Button variant='ghost' asChild>
            <a href='/'>Domov</a>
          </Button>
          <Button variant='ghost' asChild>
            <a href='/vozidla'>Vozidla</a>
          </Button>
          {/* <LanguageSwitch /> */}
          <ThemeSwitch />
        </div>
      </header>
    </>
  )
}

export default Header
import React from 'react'
import { Button } from '../ui/button'
import { ThemeSwitch } from '../ui/theme-switch'
import { Link } from '@inertiajs/react'
// import { useTranslations } from 'next-intl'
// import LanguageSwitch from '../ui/language-switch'

const Header = () => {
  // TODO: Implement translations for header
  // const t = useTranslations('Header')

  return (
    <>
      <header className='flex items-center justify-between p-2'>
        <Link href={'/'} className='px-2 text-2xl font-semibold'>Retro Servis</Link>
        <div className='flex gap-2'>
          <Button variant='ghost' asChild>
            <Link href='/'>Domov</Link>
          </Button>
          <Button variant='ghost' asChild>
            <Link href='/vozidla'>Vozidla</Link>
          </Button>
          {/* <LanguageSwitch /> */}
          <ThemeSwitch />
        </div>
      </header>
    </>
  )
}

export default Header
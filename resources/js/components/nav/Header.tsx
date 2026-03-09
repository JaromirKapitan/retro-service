import React from 'react'
import { Button } from '../ui/button'
import { ThemeSwitch } from '../ui/theme-switch'
import { Link } from '@inertiajs/react'

const Header = () => {
  return (
    <>
      <header className='flex items-center justify-between p-2'>
        <Link href={'/'} className='px-2 text-4xl font-semibold font-allura'>RS</Link>
        <div className='flex gap-2'>
          <Button variant='ghost' asChild>
            <Link href='/'>Domov</Link>
          </Button>
          <Button variant='ghost' asChild>
            <Link href='/vehicles'>Vozidla</Link>
          </Button>
          <Button variant='ghost' asChild>
            <Link href='/calendar'>Kalendář</Link>
          </Button>
          {/* <LanguageSwitch /> */}
          <ThemeSwitch />
        </div>
      </header>
    </>
  )
}

export default Header

import React, { useEffect } from 'react'
import { Card, CardContent, CardFooter, CardHeader } from '../ui/card'
import { Button } from '../ui/button'

const CookiePopup = () => {
  const [opened, setOpened] = React.useState(false)

  const handleAgree = () => {
    setOpened(false)

    sessionStorage.setItem('cookies', 'true')
  }

  useEffect(() => {
    if (sessionStorage.getItem('cookies') !== 'true') {
      setOpened(true)
    }
  }, [])

  if (!opened) return null

  return (
    <Card className='fixed z-50 bottom-4 right-4'>
      <CardContent>
        Tato stranka pouziva cookies
      </CardContent>
      <CardFooter>
        <Button className='w-full' onClick={ handleAgree }>
          Suhlasim
        </Button>
      </CardFooter>
    </Card>
  )
}

export default CookiePopup
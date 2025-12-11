import React from 'react'
import Container from '../ui/container'

interface StatsProps {
    stats?: { [key: string]: any } | null;
}

const Stats = ({stats}: StatsProps) => {
    return (
        <Container className='p-4 py-24 md:py-12 flex flex-col gap-8'>
            <h1 className='text-4xl text-center font-semibold'>{__('web.stats')}</h1>
            <div className='grid gap-16 lg:gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4'>
                <div className='flex flex-col gap-4 items-center justify-center'>
                    <h1 className='text-6xl font-semibold'>{stats?.vehicles ?? 0}</h1>
                    <p className='text-2xl'>{__('web.vehicles')}</p>
                </div>
                <div className='flex flex-col gap-4 items-center justify-center'>
                    <h1 className='text-6xl font-semibold'>{stats?.cars ?? 0}</h1>
                    <p className='text-2xl'>{__('web.cars')}</p>
                </div>
                <div className='flex flex-col gap-4 items-center justify-center'>
                    <h1 className='text-6xl font-semibold'>{stats?.moto ?? 0}</h1>
                    <p className='text-2xl'>{__('web.motobikes')}</p>
                </div>
                <div className='flex flex-col gap-4 items-center justify-center'>
                    <h1 className='text-6xl font-semibold'>{stats?.buses ?? 0}</h1>
                    <p className='text-2xl'>{__('web.buses')}</p>
                </div>
            </div>
        </Container>
    )
}

export default Stats

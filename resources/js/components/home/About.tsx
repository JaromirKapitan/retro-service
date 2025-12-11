import React from 'react'
import StyledContainer from '../ui/container'
import ReactMarkdown from 'react-markdown'
import remarkGfm from 'remark-gfm';

interface AboutProps {
    page?: { [key: string]: any } | null;
}

const About: React.FC<AboutProps> = ({page}: AboutProps) => {
  return (
    <StyledContainer className='py-8 grid grid-cols-1 md:grid-cols-2 items-center gap-8'>
      <h1 className='text-4xl font-semibold text-center'>{page?.title}</h1>
      <div>
        <ReactMarkdown remarkPlugins={[remarkGfm]}>{page?.content}</ReactMarkdown>
      </div>
    </StyledContainer>
  )
}

export default About

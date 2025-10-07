export default async function Page() {
  const data = await fetch('http://127.0.0.1:8000/posts/')
  const posts = await data.json()

  return (
    <div style={{ display: 'grid', gap: '1rem', padding: '1rem' }}>
      {posts.map((post) => (
        <div 
          key={post.id} 
          style={{ 
            border: '1px solid #ccc', 
            borderRadius: '8px', 
            padding: '1rem', 
            boxShadow: '0 2px 4px rgba(0,0,0,0.1)' 
          }}
        >
          <h2>{post.title}</h2>
          <h3>By {post.author}</h3>
          <p>{post.content}</p>
        </div>
      ))}
    </div>
  )
}

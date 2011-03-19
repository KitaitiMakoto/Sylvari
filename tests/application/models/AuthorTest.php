<?

require_once dirname(__FILE__) . '/../../test_helper.php';
require_once APPLICATION_PATH . '/models/Book.php';
require_once APPLICATION_PATH . '/models/Author.php';

class AuthorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->author = new Model_Author('シルヴァリ', 'しるばり');
    }
    
    public function testHasName()
    {
        $this->assertEquals('シルヴァリ', $this->author->getName());
    }
    
    public function testHasNameKana()
    {
        $this->assertEquals('しるばり', $this->author->getNameKana());
    }
    
    public function testHasNoBooksWhenConstructed()
    {
        $this->assertEquals(array(), $this->author->getBooks());
    }
    
    public function testHasSomeBooksWhenCountedAsAuthorOfSomeBooks()
    {
        $book1 = $this->getMock('Model_Book');
        $book2 = $this->getMock('Model_Book');
        
        foreach (array($book1, $book2) as $book) {
            $this->author->addBook($book);
        }
        
        $this->assertEquals(array($book1, $book2), $this->author->getBooks());
    }
    
    public function testUnableToAddNonBookObject()
    {
        $nonBook = new stdClass;
        
        $this->setExpectedException('PHPUnit_Framework_Error');
        $this->author->addBook($nonBook);
    }
}
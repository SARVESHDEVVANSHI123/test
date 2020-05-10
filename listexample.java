import java.awt.Container;

import javax.swing.JFrame;
import javax.swing.JList;
import javax.swing.JOptionPane;
import javax.swing.JScrollPane;
import javax.swing.ListSelectionModel;
import javax.swing.event.ListSelectionEvent;
import javax.swing.event.ListSelectionListener;

/**
 * 
 */

/**
 * @author sarvesh
 *
 */
public class listexample implements ListSelectionListener {
	JList jlist;
	/**
	 * @param args
	 */
	listexample()
	{
		String arr[]={"C","C++","JAVA","PYTHON"};
		JFrame frame=new JFrame();
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
	frame.setVisible(true);
	frame.setLayout(null);
	frame.setSize(300,300);
	
	Container c=frame.getContentPane();
	jlist=new JList(arr);
	jlist.setBounds(50,50,100,50);
	//jlist.setVisibleRowCount();
	jlist.setSelectionMode(ListSelectionModel.MULTIPLE_INTERVAL_SELECTION);
	c.add(new JScrollPane(jlist));
	jlist.addListSelectionListener(this);
	frame.add(jlist);
	}
	public static void main(String[] args) {
		// TODO Auto-generated method stub
         new listexample();
	}

	@Override
	public void valueChanged(ListSelectionEvent e) {
		// TODO Auto-generated method stub
		String dest="";
		Object obj[]=jlist.getSelectedValues();
		for(int i=0;i<obj.length;i++)
		{
			dest+=(String)obj[i];
		}
		JOptionPane.showMessageDialog(null,"Selected value:"+dest+" ");
	}

}
